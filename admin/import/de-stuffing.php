<?php
$path_prefix = "../";
$is_root = false;
include $path_prefix . 'includes/header.php';

// Mock System Data: Simulating data fetched from previous stages (Gate-In)
$preloaded_data = [
    ['truck' => 'GJ12BV8821', 'date' => date('Y-m-d'), 'bags' => 880, 'gross' => 26044, 'tare' => 12000],
    ['truck' => 'GJ12CX4432', 'date' => date('Y-m-d'), 'bags' => 450, 'gross' => 15000, 'tare' => 5000]
];
?>
<?php include $path_prefix . 'includes/sidebar.php'; ?>

<style>
    /* Modern Simple Table - User Requested Style */
    .simple-table { width: 100%; border-collapse: collapse; }
    .simple-table th { padding: 12px 15px; background: #f8fafc; font-size: 10px; font-weight: 800; color: #475569; text-transform: uppercase; text-align: left; border-bottom: 2.2px solid #000; }
    .simple-table td { padding: 8px 12px; border-bottom: 1px solid #f1f5f9; vertical-align: middle; }
    .simple-table tr:hover { background: #fcfdfe; }
    
    .input-simple { width: 100%; border: 1px solid #e2e8f0; border-radius: 4px; padding: 6px 8px; font-size: 11px; font-weight: 700; color: #1e293b; background: #fff; }
    .input-simple:focus { border-color: var(--primary); outline: none; box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.1); }
    
    .pill-modern { padding: 4px 10px; border-radius: 4px; font-size: 9px; font-weight: 900; text-transform: uppercase; background: #f1f5f9; color: #475569; }
</style>

<main class="main-area">    <header class="header" style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 20px 40px; position: sticky; top: 0; z-index: 1000; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <span style="font-size: 8px; font-weight: 850; color: var(--primary); text-transform: uppercase; letter-spacing: 1px; display: block; margin-bottom: 4px;">OPERATIONAL STAGE 04: CARGO DE-STUFFING & TALLY</span>
            <h1 class="page-title" style="font-size: 18px; font-weight: 850; margin: 0; color: #01172a;">Warehouse Stripping & Inventory Grounding</h1>
            <p style="font-size: 10px; color: var(--text-muted); font-weight: 600; margin-top: 2px;">OCM-IMP-24-001 | CFS DESTUFFING YARD</p>
        </div>
        <div style="display: flex; gap: 15px;">
            <button type="button" class="btn" onclick="window.location.href='gate-in-cfs.php'" style="background: #f1f5f9; color: #64748b; font-size: 11px; font-weight: 800; border: none; cursor: pointer;">PREVIOUS</button>
            <button type="submit" form="destuff-form" class="btn btn-primary" style="padding: 10px 25px; font-size: 11px; font-weight: 850; background: var(--primary); color: #fff; border: none; cursor: pointer;">SAVE & PROCEED</button>
        </div>
    </header>

    <!-- 1. Minimalist Stepper -->
    <div style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 25px 40px 0 40px;">
        <div class="minimal-stepper" style="justify-content: flex-start; margin-bottom: 0; border-bottom: none;">
            <div class="m-step completed">01. ARRIVAL</div>
            <div class="m-step completed">02. GATE OUT</div>
            <div class="m-step completed">03. GATE IN</div>
            <div class="m-step active">04. DE-STUFFING</div>
            <div class="m-step">05. DELIVERY</div>
        </div>
    </div>
    <script>
        let rowIndex = <?php echo count($preloaded_data); ?>;
        function addRows() {
            const count = parseInt(document.getElementById('row-input').value) || 1;
            const tbody = document.getElementById('simple-body');
            const today = new Date().toISOString().split('T')[0];

            for (let i = 0; i < count; i++) {
                rowIndex++;
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td style="font-size: 10px; font-weight: 850; color: #64748b;">${rowIndex}</td>
                    <td><input type="text" name="t_truck[]" class="input-simple" placeholder="E.g. GJ12..."></td>
                    <td><input type="date" name="t_date[]" class="input-simple" value="${today}"></td>
                    <td><input type="number" name="t_bags[]" class="input-simple" placeholder="0" oninput="updateTallySummary()"></td>
                    <td><input type="number" name="t_gross[]" class="input-simple" placeholder="0" oninput="calculateNet(this)"></td>
                    <td><input type="number" name="t_tare[]" class="input-simple" placeholder="0" oninput="calculateNet(this)"></td>
                    <td><input type="number" name="t_net[]" class="input-simple" style="background: #f8fafc; color: var(--primary); font-weight: 850;" readonly></td>
                    <td><input type="number" name="t_short_b[]" class="input-simple" style="color: #ef4444;" placeholder="0" oninput="updateTallySummary()"></td>
                    <td><input type="number" name="t_short_q[]" class="input-simple" style="color: #ef4444;" placeholder="0"></td>
                    <td><input type="text" name="t_lr[]" class="input-simple" placeholder="LR #"></td>
                    <td><input type="text" name="t_invoice[]" class="input-simple" placeholder="Inv #"></td>
                    <td><input type="text" name="t_supplier[]" class="input-simple" placeholder="Supplier Name"></td>
                    <td>
                        <select name="t_status[]" class="input-simple" onchange="updateTallySummary()">
                            <option value="CLEAR">CLEAR</option>
                            <option value="DAMAGED">DAMAGED</option>
                            <option value="SHORT">SHORT</option>
                        </select>
                    </td>
                    <td><input type="text" name="t_remarks[]" class="input-simple" placeholder="..."></td>
                    <td style="text-align: center;">
                        <button type="button" onclick="this.parentElement.parentElement.remove(); updateTallySummary();" style="background: transparent; border: none; color: #ef4444; font-size: 14px; cursor: pointer; opacity: 0.6;"><i class="fa-solid fa-circle-xmark"></i></button>
                    </td>
                `;
                tbody.appendChild(row);
                updateTallySummary();
            }
        }

        function calculateNet(element) {
            const row = element.parentElement.parentElement;
            const gross = parseFloat(row.querySelector('[name="t_gross[]"]').value) || 0;
            const tare = parseFloat(row.querySelector('[name="t_tare[]"]').value) || 0;
            const netField = row.querySelector('[name="t_net[]"]');
            netField.value = (gross - tare).toFixed(2);
            updateTallySummary();
        }

        function updateTallySummary() {
            let totalBags = 0;
            let goodBags = 0;
            let damagedBags = 0;
            let totalShortage = 0;

            document.querySelectorAll('#simple-body tr').forEach(row => {
                const bags = parseFloat(row.querySelector('[name="t_bags[]"]').value) || 0;
                const status = row.querySelector('[name="t_status[]"]').value;
                const shortage = parseFloat(row.querySelector('[name="t_short_b[]"]').value) || 0;

                totalBags += bags;
                totalShortage += shortage;
                
                if (status === 'CLEAR') goodBags += bags;
                else if (status === 'DAMAGED') damagedBags += bags;
            });

            document.getElementById('stat-total-bags').innerText = totalBags;
            document.getElementById('stat-good').innerText = goodBags;
            document.getElementById('stat-damaged').innerText = damagedBags;
            document.getElementById('stat-shortage').innerText = totalShortage;
        }

        function addCustomsFile() {
            const container = document.getElementById('file-inputs');
            const div = document.createElement('div');
            div.style.display = 'flex';
            div.style.gap = '12px';
            div.style.marginBottom = '12px';
            div.innerHTML = `
                <input type="text" name="customs_doc_name[]" class="form-input" placeholder="Document Name..." style="flex: 1.5; font-weight: 700; background: #fff;">
                <input type="file" name="customs_files[]" class="form-input" style="flex: 1; font-weight: 700; background: #fff;">
                <button type="button" class="btn" onclick="this.parentElement.remove()" style="background: #fff; border: 1px solid #fee2e2; color: #ef4444; width: 45px; display: flex; align-items: center; justify-content: center; border-radius: 8px;"><i class="fa-solid fa-trash-can"></i></button>
            `;
            container.appendChild(div);
        }

        window.onload = () => { 
            if(rowIndex === 0) addRows(); 
            updateTallySummary(); // Initial calculation for pre-loaded data
        };
    </script>

    <div class="content-padding" style="padding: 40px;">

        <form id="destuff-form" action="delivery-completion.php" method="POST">
            <!-- Operational Context: CFS Destination -->
            <div class="form-section" style="margin-bottom: 30px; padding: 25px; background: #f8fafc; border: 1.5px dashed #cbd5e1; border-radius: 12px;">
                <div style="display: grid; grid-template-columns: 1.5fr 1fr 1fr; gap: 20px;">
                    <div class="form-group">
                        <label class="form-label" style="font-size: 10px; color: var(--primary);">DE-STUFFING HUB / CFS NAME</label>
                        <input type="text" name="cfs_name" placeholder="Enter CFS Terminal Name (e.g. Mundra Logistics Hub)" class="form-input" style="background: #fff; font-weight: 850; border: 1px solid #cbd5e1; height: 45px;">
                    </div>
                    <div class="form-group">
                        <label class="form-label" style="font-size: 10px;">WAREHOUSE / SECTION</label>
                        <input type="text" name="wh_section" placeholder="e.g. Area A-12 / Grounding" class="form-input" style="background: #fff; font-weight: 700; border: 1px solid #cbd5e1; height: 45px;">
                    </div>
                    <div class="form-group">
                        <label class="form-label" style="font-size: 10px;">TALLY SUPERVISOR</label>
                        <input type="text" name="supervisor" placeholder="Supervisor Name" class="form-input" style="background: #fff; font-weight: 700; border: 1px solid #cbd5e1; height: 45px;">
                    </div>
                </div>
            </div>
            <!-- Dynamic Tally Summary Stats -->
            <div class="clean-stats" style="display: flex; gap: 80px; margin-bottom: 40px; padding: 25px; background: #fff; border: 1.5px solid #000; border-radius: 12px;">
                <div class="stat-item" style="display: flex; flex-direction: column; gap: 5px;">
                    <span class="s-label" style="font-size: 10px; font-weight: 850; color: #64748b; text-transform: uppercase;">TOTAL PRODUCT (BAGS)</span>
                    <span id="stat-total-bags" class="s-value" style="font-size: 24px; font-weight: 900; color: #000;">0</span>
                </div>
                <div class="stat-item" style="display: flex; flex-direction: column; gap: 5px;">
                    <span class="s-label" style="font-size: 10px; font-weight: 850; color: var(--secondary);">GOOD / CLEAR</span>
                    <span id="stat-good" class="s-value" style="font-size: 24px; font-weight: 900; color: var(--secondary);">0</span>
                </div>
                <div class="stat-item" style="display: flex; flex-direction: column; gap: 5px;">
                    <span class="s-label" style="font-size: 10px; font-weight: 850; color: #ef4444;">DAMAGED UNITS</span>
                    <span id="stat-damaged" class="s-value" style="font-size: 24px; font-weight: 900; color: #ef4444;">0</span>
                </div>
                <div class="stat-item" style="display: flex; flex-direction: column; gap: 5px;">
                    <span class="s-label" style="font-size: 10px; font-weight: 850; color: #000;">TOTAL SHORTAGE (B)</span>
                    <span id="stat-shortage" class="s-value" style="font-size: 24px; font-weight: 900; color: #000;">0</span>
                </div>
            </div>

            <!-- User Requested Simple Table Layout -->
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
                <div>
                    <h3 class="section-title" style="margin-bottom: 5px;"><i class="fa-solid fa-clipboard-list"></i> Detailed Weightment & Tally Matrix</h3>
                    <p style="font-size: 12px; color: #64748b; font-weight: 600;">High-precision log for individual trucks, weights, and cargo condition.</p>
                </div>
                <div style="display: flex; gap: 10px; align-items: center;">
                    <input type="number" id="row-input" class="input-simple" style="width: 60px; height: 38px; text-align: center;" value="1">
                    <button type="button" onclick="addRows()" class="btn" style="background: var(--secondary); color: #fff; font-size: 12px; font-weight: 850; padding: 12px 25px; border-radius: 10px;">
                        <i class="fa-solid fa-plus-circle"></i> ADD ROWS
                    </button>
                </div>
            </div>

            <div style="overflow-x: auto; border: 1.5px solid #000; border-radius: 8px; background: #fff;">
                <table class="simple-table">
                    <thead>
                        <tr>
                            <th width="40">#</th>
                            <th width="120">Truck #</th>
                            <th width="110">Date</th>
                            <th width="80">Bags</th>
                            <th width="90">Gross</th>
                            <th width="90">Tare</th>
                            <th width="100" style="color: var(--primary);">Net WT</th>
                            <th width="80" style="color: #ef4444;">Short/B</th>
                            <th width="80" style="color: #ef4444;">Short/Q</th>
                            <th width="140">LR Info</th>
                            <th width="140">Invoice</th>
                            <th width="160">Supplier</th>
                            <th width="90">Status</th>
                            <th width="180">Remarks</th>
                            <th width="50" style="padding-right: 20px;"></th>
                        </tr>
                    </thead>
                    <tbody id="simple-body">
                        <?php foreach($preloaded_data as $index => $row): ?>
                        <tr>
                            <td style="font-size: 10px; font-weight: 850; color: #64748b;"><?php echo $index + 1; ?></td>
                            <td><input type="text" name="t_truck[]" value="<?php echo $row['truck']; ?>" class="input-simple" placeholder="E.g. GJ12..."></td>
                            <td><input type="date" name="t_date[]" value="<?php echo $row['date']; ?>" class="input-simple"></td>
                            <td><input type="number" name="t_bags[]" value="<?php echo $row['bags']; ?>" class="input-simple" placeholder="0" oninput="updateTallySummary()"></td>
                            <td><input type="number" name="t_gross[]" value="<?php echo $row['gross']; ?>" class="input-simple" placeholder="0" oninput="calculateNet(this)"></td>
                            <td><input type="number" name="t_tare[]" value="<?php echo $row['tare']; ?>" class="input-simple" placeholder="0" oninput="calculateNet(this)"></td>
                            <td><input type="number" name="t_net[]" value="<?php echo $row['gross'] - $row['tare']; ?>" class="input-simple" style="background: #f8fafc; color: var(--primary); font-weight: 850;" readonly></td>
                            <td><input type="number" name="t_short_b[]" class="input-simple" style="color: #ef4444;" placeholder="0" oninput="updateTallySummary()"></td>
                            <td><input type="number" name="t_short_q[]" class="input-simple" style="color: #ef4444;" placeholder="0"></td>
                            <td><input type="text" name="t_lr[]" class="input-simple" placeholder="LR #"></td>
                            <td><input type="text" name="t_invoice[]" class="input-simple" placeholder="Inv #"></td>
                            <td><input type="text" name="t_supplier[]" class="input-simple" placeholder="Supplier Name"></td>
                            <td>
                                <select name="t_status[]" class="input-simple" onchange="updateTallySummary()">
                                    <option value="CLEAR">CLEAR</option>
                                    <option value="DAMAGED">DAMAGED</option>
                                    <option value="SHORT">SHORT</option>
                                </select>
                            </td>
                            <td><input type="text" name="t_remarks[]" class="input-simple" placeholder="..."></td>
                            <td style="text-align: center;">
                                <button type="button" onclick="this.parentElement.parentElement.remove(); updateTallySummary();" style="background: transparent; border: none; color: #ef4444; font-size: 14px; cursor: pointer; opacity: 0.6;"><i class="fa-solid fa-circle-xmark"></i></button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div style="margin-top: 40px; display: grid; grid-template-columns: 1fr; gap: 40px;">
                <div>
                    <label class="form-label">Customs Check Documents / Multiple Attachments</label>
                    <div id="file-uploader" style="background: #f8fafc; border: 1px solid var(--border); border-radius: 12px; padding: 25px;">
                        <div id="file-inputs">
                            <div style="display: flex; gap: 12px; margin-bottom: 12px;">
                                <input type="text" name="customs_doc_name[]" class="form-input" placeholder="Document Name (e.g. Customs Release)" style="flex: 1.5; font-weight: 700; background: #fff;">
                                <input type="file" name="customs_files[]" class="form-input" style="flex: 1; font-weight: 700; background: #fff;">
                                <button type="button" class="btn" onclick="this.parentElement.remove()" style="background: #fff; border: 1px solid #fee2e2; color: #ef4444; width: 45px; display: flex; align-items: center; justify-content: center; border-radius: 8px;"><i class="fa-solid fa-trash-can"></i></button>
                            </div>
                        </div>
                        <button type="button" onclick="addCustomsFile()" class="btn" style="margin-top: 5px; background: var(--primary); color: #fff; font-size: 10px; font-weight: 850; padding: 10px 20px; border-radius: 8px;">
                            <i class="fa-solid fa-plus-circle"></i> ADD MORE DOCUMENTS
                        </button>
                    </div>
                </div>
            </div>

            <div style="display: flex; justify-content: flex-end; padding-top: 30px;">
                <button type="submit" class="btn btn-primary" style="padding: 16px 60px; font-size: 12px; font-weight: 850; background: var(--primary); color: #fff; border: none; border-radius: 10px;">DELIVERY LOGS <i class="fa-solid fa-arrow-right" style="margin-left: 10px;"></i></button>
            </div>
        </form>
    </div>
</main>

<?php include $path_prefix . 'includes/footer.php'; ?>