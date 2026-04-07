<?php
$path_prefix = "../";
$is_root = false;
include $path_prefix . 'includes/header.php';
?>
<?php include $path_prefix . 'includes/sidebar.php'; ?>

<style>
    .matrix-table { width: 100%; border-collapse: collapse; border: 1px solid #000; margin-top: 15px; }
    .matrix-table th { background: #f8fafc; border: 1px solid #000; padding: 14px 12px; font-size: 11px; font-weight: 850; color: #000; text-transform: uppercase; text-align: center; }
    .matrix-table td { border: 1px solid #000; padding: 10px; vertical-align: middle; }
    .matrix-input { border: none; background: transparent; width: 100%; font-size: 13px; font-weight: 800; color: #000; outline: none; text-align: center; padding: 5px; }
    .matrix-input:focus { color: var(--primary); }
</style>

<main class="main-area">
    <header class="header" style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 20px 40px; position: sticky; top: 0; z-index: 1000; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <span style="font-size: 8px; font-weight: 850; color: var(--primary); text-transform: uppercase; letter-spacing: 1px; display: block; margin-bottom: 4px;">OPERATIONAL STAGE 02: GATE OUT & TRANSPORT</span>
            <h1 class="page-title" style="font-size: 18px; font-weight: 850; margin: 0; color: #01172a;">Transport Matrix & Dispatch Log</h1>
            <p style="font-size: 10px; color: var(--text-muted); font-weight: 600; margin-top: 2px;">OCM-IMP-24-001 | MUNDRA PORT GATE OUT</p>
        </div>
        <div style="display: flex; gap: 15px;">
            <button type="button" class="btn" onclick="window.location.href='../work-assignment.php'" style="background: #f1f5f9; color: #64748b; font-size: 11px; font-weight: 850; border: none; cursor: pointer;">ACTIVE TASKS</button>
            <button type="button" class="btn" onclick="window.location.href='vessel-arrival.php'" style="background: #f1f5f9; color: #64748b; font-size: 11px; font-weight: 800; border: none; cursor: pointer;">PREVIOUS</button>
            <button type="submit" form="gate-out-form" class="btn btn-primary" style="padding: 10px 25px; font-size: 11px; font-weight: 850; background: var(--primary); color: #fff; border: none; cursor: pointer;">SAVE & PROCEED</button>
        </div>
    </header>

    <!-- Tab-Style Progress Bar - Below Header -->
    <div style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 25px 40px 10px 40px;">
        <div style="display: flex; justify-content: center; gap: 80px;">
            <!-- Stage 1 -->
            <div style="padding-bottom: 15px; color: #94a3b8; font-size: 11px; font-weight: 850; letter-spacing: 1px; text-transform: uppercase;">
                01. ARRIVAL
            </div>
            <!-- Stage 2: Active -->
            <div style="padding-bottom: 15px; border-bottom: 4px solid var(--primary); color: var(--primary); font-size: 11px; font-weight: 850; letter-spacing: 1px; text-transform: uppercase;">
                02. GATE OUT
            </div>
            <!-- Stage 3 -->
            <div style="padding-bottom: 15px; color: #94a3b8; font-size: 11px; font-weight: 850; letter-spacing: 1px; text-transform: uppercase;">
                03. GATE IN
            </div>
            <!-- Stage 4 -->
            <div style="padding-bottom: 15px; color: #94a3b8; font-size: 11px; font-weight: 850; letter-spacing: 1px; text-transform: uppercase;">
                04. DE-STUFFING
            </div>
            <!-- Stage 5 -->
            <div style="padding-bottom: 15px; color: #94a3b8; font-size: 11px; font-weight: 850; letter-spacing: 1px; text-transform: uppercase;">
                05. DELIVERY
            </div>
        </div>
    </div>

    <div class="content-padding" style="padding: 40px;">

        <form id="gate-out-form" action="gate-in-cfs.php" method="POST">
            <div class="form-section">
                <h3 class="section-title"><i class="fa-solid fa-truck-moving"></i> Transport Assignment & Partner Configuration</h3>
                <div style="display: grid; grid-template-columns: 1.5fr 1fr; gap: 24px;">
                    <div class="form-group">
                        <label class="form-label">Transport Agency (Assign Primary Partner)</label>
                        <div style="display: flex; gap: 12px;">
                            <select name="transport_partner" class="form-input" style="font-weight: 700; flex: 1;">
                                <option>Select Approved Partner...</option>
                                <option selected>GLOBAL LOGISTICS CO.</option>
                                <option>EXPRESS MULTIMODAL</option>
                                <option>MUNDRA FLEET SOLUTIONS</option>
                            </select>
                            <button type="button" class="btn" style="background: var(--primary); color: #fff; font-size: 10px; border-radius: 8px; font-weight: 800;"><i class="fa-solid fa-plus-circle"></i> NEW</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Transport Matrix Hub -->
            <div class="form-section" style="padding: 40px; border: 2px solid #e2e8f0;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h3 class="section-title" style="margin: 0;"><i class="fa-solid fa-table-list"></i> Unit-Wise Transport Matrix (LR Assignment)</h3>
                    <button type="button" onclick="addRow()" class="btn" style="background: var(--primary); color: #fff; font-size: 11px; font-weight: 800; padding: 8px 20px; border-radius: 6px;"><i class="fa-solid fa-plus"></i> ADD TRUCK UNIT</button>
                </div>
                
                <div style="overflow-x: auto;">
                    <table class="matrix-table" id="transport-matrix">
                        <thead>
                            <tr>
                                <th width="150">Truck Number</th>
                                <th width="150">Container No</th>
                                <th width="130">Seal ID</th>
                                <th width="120">Gate Out Date</th>
                                <th width="100">Time</th>
                                <th width="90">Tare Wt</th>
                                <th width="90">Gross Wt</th>
                                <th width="90">Net Wt</th>
                                <th width="140">LR (Lorry Receipt)</th>
                                <th>Driver / Remarks</th>
                                <th width="50"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="t_truck[]" class="matrix-input" value="GJ12BV8821" style="color: var(--primary); font-weight: 950;"></td>
                                <td><input type="text" name="t_cntr[]" class="matrix-input" value="MSKU1234567"></td>
                                <td><input type="text" name="t_seal[]" class="matrix-input" value="B163979"></td>
                                <td><input type="date" name="t_date[]" class="matrix-input" value="<?php echo date('Y-m-d'); ?>"></td>
                                <td><input type="time" name="t_time[]" class="matrix-input" value="<?php echo date('H:i'); ?>"></td>
                                <td><input type="number" name="t_tare[]" class="matrix-input" value="4000"></td>
                                <td><input type="number" name="t_gross[]" class="matrix-input" value="26044"></td>
                                <td><input type="number" name="t_net[]" class="matrix-input" value="22044"></td>
                                <td><input type="text" name="t_lr[]" class="matrix-input" value="LR-882190"></td>
                                <td><input type="text" name="t_rem[]" class="matrix-input" placeholder="..."></td>
                                <td align="center"><i class="fa-solid fa-circle-xmark" style="color: #cbd5e1; cursor: pointer;" onclick="this.closest('tr').remove()"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div style="margin-top: 30px; display: grid; grid-template-columns: 1fr 1fr; gap: 40px;">
                    <div>
                        <label class="form-label">Gate Pass Scanned Copies / Attachments</label>
                        <div id="file-uploader" style="background: #f8fafc; border: 1px solid var(--border); border-radius: 12px; padding: 20px;">
                            <div id="file-inputs">
                                <div style="display: flex; gap: 12px; margin-bottom: 12px;">
                                    <input type="text" name="doc_name[]" class="form-input" placeholder="Document Name (e.g. Gate Pass Front)" style="flex: 1.5; font-weight: 700; background: #fff;">
                                    <input type="file" name="go_files[]" class="form-input" style="flex: 1; font-weight: 700; background: #fff;">
                                    <button type="button" class="btn" style="background: #fff; border: 1px solid #fee2e2; color: #ef4444; width: 45px; display: flex; align-items: center; justify-content: center; border-radius: 8px;"><i class="fa-solid fa-trash-can"></i></button>
                                </div>
                            </div>
                            <button type="button" onclick="addFileInput()" class="btn" style="margin-top: 5px; background: var(--primary); color: #fff; font-size: 10px; font-weight: 850; padding: 10px 20px; border-radius: 8px;">
                                <i class="fa-solid fa-plus-circle"></i> ADD MORE DOCUMENTS
                            </button>
                        </div>
                    </div>
                    <div>
                        <label class="form-label">Stage 2 Notes / Discrepancies</label>
                        <textarea name="remarks_go" rows="3" class="form-input" style="height: 110px; font-weight: 700;"></textarea>
                    </div>
                </div>
            </div>

            <div style="display: flex; justify-content: flex-end; padding-top: 30px;">
                <button type="submit" class="btn btn-primary" style="padding: 16px 60px; font-size: 12px; font-weight: 850; background: var(--primary); color: #fff; border: none; border-radius: 10px;">CFS GATE IN <i class="fa-solid fa-arrow-right" style="margin-left: 10px;"></i></button>
            </div>
        </form>
    </div>
</main>

<script>
    function addRow() {
        const tbody = document.querySelector('#transport-matrix tbody');
        const row = document.createElement('tr');
        row.innerHTML = `
            <td><input type="text" name="t_truck[]" class="matrix-input" placeholder="GJ12.."></td>
            <td><input type="text" name="t_cntr[]" class="matrix-input" placeholder="MSKU.."></td>
            <td><input type="text" name="t_seal[]" class="matrix-input" placeholder="B16.."></td>
            <td><input type="date" name="t_date[]" class="matrix-input" value="<?php echo date('Y-m-d'); ?>"></td>
            <td><input type="time" name="t_time[]" class="matrix-input" value="<?php echo date('H:i'); ?>"></td>
            <td><input type="number" name="t_tare[]" class="matrix-input" placeholder="0"></td>
            <td><input type="number" name="t_gross[]" class="matrix-input" placeholder="0"></td>
            <td><input type="number" name="t_net[]" class="matrix-input" placeholder="0"></td>
            <td><input type="text" name="t_lr[]" class="matrix-input" placeholder="LR.."></td>
            <td><input type="text" name="t_rem[]" class="matrix-input" placeholder="..."></td>
            <td align="center"><i class="fa-solid fa-circle-xmark" style="color: #cbd5e1; cursor: pointer;" onclick="this.closest('tr').remove()"></i></td>
        `;
        tbody.appendChild(row);
    }

    function addFileInput() {
        const container = document.getElementById('file-inputs');
        const div = document.createElement('div');
        div.style.display = 'flex';
        div.style.gap = '12px';
        div.style.marginBottom = '12px';
        div.innerHTML = `
            <input type="text" name="doc_name[]" class="form-input" placeholder="Document Name..." style="flex: 1.5; font-weight: 700; background: #fff;">
            <input type="file" name="go_files[]" class="form-input" style="flex: 1; font-weight: 700; background: #fff;">
            <button type="button" onclick="this.parentElement.remove()" class="btn" style="background: #fff; border: 1px solid #fee2e2; color: #ef4444; width: 45px; display: flex; align-items: center; justify-content: center; border-radius: 8px;"><i class="fa-solid fa-trash-can"></i></button>
        `;
        container.appendChild(div);
    }
</script>

<?php include $path_prefix . 'includes/footer.php'; ?>
