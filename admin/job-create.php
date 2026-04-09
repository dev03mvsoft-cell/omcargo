<?php
$path_prefix = "";
$is_root = false;
include 'includes/header.php';
?>
<?php include 'includes/sidebar.php'; ?>

<!-- MAIN AREA START -->
<main class="main-area">
    <header class="header" style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 20px 40px; position: sticky; top: 0; z-index: 1000;">
        <div>
            <span style="font-size: 9px; font-weight: 850; color: var(--primary); text-transform: uppercase; letter-spacing: 1px; display: block; margin-bottom: 4px;">STAGE 01: SHIPMENT INITIALIZATION</span>
            <h1 class="page-title" style="font-size: 18px; font-weight: 800; margin: 0; letter-spacing: -0.5px;">Create New Shipment Job</h1>
            <p style="font-size: 11px; color: var(--text-muted); font-weight: 600; margin-top: 2px;">Standard Operational Manifest Protocol</p>
        </div>
        <div style="display: flex; gap: 12px; align-items: center;">
            <div style="text-align: right; border-right: 1px solid #f1f5f9; padding-right: 20px; display: none; @media (min-width: 1024px) { display: block; }">
                <p style="font-size: 9px; font-weight: 800; color: #94a3b8; text-transform: uppercase; margin: 0;">System Status</p>
                <p style="font-size: 10px; color: #10b981; font-weight: 800; margin: 0;">LIVE • ENGINE ACTIVE</p>
            </div>
            <button type="button" onclick="window.history.back()" class="btn" style="background: #fff; border: 1px solid #e2e8f0; color: #64748b; font-size: 11px; font-weight: 800; padding: 8px 20px;">BACK</button>
        </div>
    </header>

    <div class="content-padding">

        <form id="master-form" action="job-assign-slip.php" method="POST">

            <!-- 1. SHIPMENT CORE -->
            <div class="form-section">
                <h3 class="section-title" style="font-weight: 500;"><i class="fa-solid fa-id-card"></i> Shipment Core Details</h3>
                <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px;">
                    <div class="form-group"><label>Job ID</label><input type="text" name="job_id" readonly value="OCM-EXP-24-001" class="form-input" style="background:#f1f5f9; font-weight:600; color:var(--primary);"></div>
                    <div class="form-group"><label>ADD Client</label><select name="client_id" required class="form-input" style="font-weight: 500; border-color: var(--primary);">
                            <option value="">Select Account...</option>
                            <option value="GLO">GLOBAL LOGIX (GLO)</option>
                            <option value="NEX">NEXUS TRANSPORT (NEX)</option>
                            <option value="OMC">OMAN CEMENT (OMC)</option>
                        </select></div>
                    <div class="form-group"><label>Modality</label>
                        <select name="modality" id="modality-select" class="form-input" onchange="updateProtocol()">
                            <option value="export">EXPORT</option>
                            <option value="import">IMPORT</option>
                        </select>
                    </div>
                    <div class="form-group"><label>Operational Protocol</label>
                        <select name="protocol" id="protocol-select" class="form-input" onchange="handleProtocolChange()">
                            <option value="dock_stuffing" selected>DOCK STUFFING</option>
                            <option value="factory_stuffing">FACTORY STUFFING</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- 2. AI HUB -->
            <div class="extraction-header">
                <h3 style="font-size: 1.125rem; font-weight: 800; color: var(--text-main); margin-bottom: 16px;">Scan Document to Fetch Data</h3>
                <div style="display: flex; gap: 16px;"><input type="file" class="form-input" style="background: white; flex: 1;"><button type="button" onclick="startScan()" class="btn" style="background: var(--primary); color: #fff; padding: 0 40px; border-radius: 12px; font-weight: 850; border: none; font-size: 11px;"><i class="fa-solid fa-bolt"></i> START DEEP SYNC</button></div>
            </div>

            <div class="grid-custom">
                <!-- LEFT PILLAR: PARTY MAPPING -->
                <div>
                    <div class="form-section">
                        <h3 class="section-title"><i class="fa-solid fa-user-tie"></i> Shipper (Identification)</h3>
                        <textarea id="shipper-editor" style="height: 400px;" name="shipper_data" class="form-input" placeholder="Enter Full Shipper Details (Name, Address, GST, IEC, etc.)"></textarea>
                    </div>

                    <!-- Side-by-Side: Consignee & Notify -->
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                        <div class="form-section">
                            <h3 class="section-title"><i class="fa-solid fa-building"></i> Consignee</h3>
                            <textarea id="consignee-editor" style="height: 300px;" name="consignee_data" class="form-input" placeholder="Enter Consignee Name & Address"></textarea>
                        </div>
                        <div class="form-section">
                            <h3 class="section-title"><i class="fa-solid fa-bullhorn"></i> Notify Party</h3>
                            <textarea id="notify-editor" style="height: 300px;" name="notify_data" class="form-input" placeholder="Enter Notify Party Information"></textarea>
                        </div>
                    </div>
                </div>

                <!-- RIGHT PILLAR: LOGISTICS METADATA -->
                <div>
                    <div class="form-section">
                        <h3 class="section-title"><i class="fa-solid fa-route"></i> Manifest Parameters</h3>
                        <div class="sub-grid" style="grid-template-columns: 1fr 1fr; gap: 12px;">
                            <div class="form-group"><label>Invoice No.</label><input type="text" id="i-no" class="form-input" style="font-weight: 800; border-color: var(--primary);"></div>
                            <div class="form-group"><label>Invoice Date</label><input type="text" id="i-date" class="form-input"></div>
                            <div class="form-group" style="grid-column: span 2;"><label>P.O No & Date</label>
                                <div style="display:flex;gap:10px;"><input type="text" placeholder="PO NO" class="form-input"><input type="text" placeholder="PO DATE" class="form-input"></div>
                            </div>
                            <div class="form-group"><label>Shipping Bill</label><input type="text" placeholder="SB NO/DATE" class="form-input"></div>
                            <div class="form-group"><label>Reverse Charge</label><input type="text" value="Not Applicable" class="form-input"></div>
                            <div class="form-group"><label>Transport Mode</label><input type="text" class="form-input"></div>
                            <div class="form-group"><label>Port Code</label><input type="text" class="form-input"></div>
                            <div class="form-group"><label>Delivery Terms</label><input type="text" class="form-input"></div>
                            <div class="form-group"><label>Place of Receipt</label><input type="text" class="form-input"></div>
                            <div class="form-group"><label>Loading Port</label><input type="text" value="MUNDRA, INDIA" class="form-input"></div>
                            <div class="form-group"><label>Container No.</label><input type="text" class="form-input"></div>
                            <div class="form-group" style="grid-column: span 2;"><label>Carrier Line</label><input type="text" class="form-input"></div>
                            <div class="form-group"><label>Supply Date</label><input type="text" class="form-input"></div>
                            <div class="form-group"><label>Discharge Port</label><input type="text" class="form-input"></div>
                            <div class="form-group" style="grid-column: span 2;"><label>Delivery Place</label><input type="text" class="form-input"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 5. STRATEGIC COMMODITY MANIFEST (OPERATIONAL ONLY) -->
            <div class="card" style="padding: 40px; overflow-x: auto;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
                    <h3 class="section-title" style="margin: 0;"><i class="fa-solid fa-boxes-stacked"></i> Strategic Commodity Manifest (Zero-Overflow Sync)</h3>
                    <button type="button" onclick="addItem()" class="btn btn-secondary" style="font-size: 10px;"><i class="fa-solid fa-plus"></i> ADD NEW COMMODITY</button>
                </div>
                <table class="classic-table">
                    <thead>
                        <tr>
                            <th width="60">Sr.</th>
                            <th width="450">Description of Goods</th>
                            <th width="120">HSN Code</th>
                            <th width="100">BAGS / PKGS</th>
                            <th width="120">QUANTITY</th>
                            <th width="150">NET WEIGHT</th>
                        </tr>
                    </thead>
                    <tbody id="manifest-body">
                        <tr>
                            <td align="center" rowspan="2" style="border: 2px solid #000;"><input type="text" name="t_sr_r[]" class="data-input" value="01"></td>
                            <td rowspan="2" style="border: 2px solid #000;"><textarea name="t_desc[]" rows="4" class="data-input" style="text-align: left; font-size: 11px;"></textarea></td>
                            <td rowspan="2" style="border: 2px solid #000;"><input type="text" name="t_hsn[]" class="data-input"></td>
                            <td colspan="3" style="border: 2px solid #000; padding: 0; background: #ffffff;">
                                <input type="text" name="t_cat[]" class="cat-label" placeholder="PRODUCT CATEGORY (e.g. MOSAIC)" style="text-align: center; height: 32px;">
                            </td>
                        </tr>
                        <tr>
                            <td style="border: 2px solid #000;"><input type="text" name="t_bags[]" class="data-input" placeholder="BAGS"></td>
                            <td style="border: 2px solid #000;"><input type="text" name="t_qty[]" class="data-input" placeholder="QTY"></td>
                            <td style="border: 2px solid #000;"><input type="text" name="t_nw[]" class="data-input" placeholder="WEIGHT"></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="footer-label" align="center">SUMMARY</td>
                            <td class="footer-label" style="padding-left: 20px;">
                                <input type="text" name="f_terms" class="data-input" style="text-align: left; display: inline-block; width: 80%;" value="FOB MUNDRA">
                            </td>
                            <td class="footer-label" align="center">TOTAL PKGS</td>
                            <td align="center"><input type="text" name="f_pkgs" class="data-input" value="24"></td>
                            <td class="footer-label" align="center">GROSS WT</td>
                            <td><input type="text" name="f_gross" class="data-input" value="24475 Kgs"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>



            <!-- 7. MASTER REGISTRY -->
            <div class="form-section" style="margin-top: 20px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
                    <h3 class="section-title" style="margin: 0;"><i class="fa-solid fa-folder-tree"></i> Document Registry</h3><button type="button" onclick="addR()" class="btn btn-secondary" style="font-size: 10px;">+ REGISTER ASSET</button>
                </div>
                <div id="reg-hub">
                    <div class="registry-row"><input type="text" class="form-input" placeholder="Category"><input type="file" class="form-input"></div>
                </div>
            </div>

            <div style="display: flex; justify-content: flex-end; padding: 40px 0;"><button type="submit" class="btn" style="background: var(--primary); color: #fff; padding: 16px 80px; border-radius: 12px; font-weight: 850; border: none; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);">GENERATE ASSIGNMENT SLIP</button></div>
        </form>
    </div>
</main>
<!-- MAIN AREA END -->

<script>
    // Modality-aware Protocol Management
    const protocols = {
        export: [{
                val: 'factory_stuffing',
                text: 'FACTORY STUFFING'
            },
            {
                val: 'dock_stuffing',
                text: 'DOCK STUFFING'
            }
        ],
        import: [{
                val: 'factory_import',
                text: 'FACTORY IMPORT'
            },
            {
                val: 'dock_import',
                text: 'DOCK IMPORT'
            }
        ]
    };

    function updateProtocol() {
        const mod = document.getElementById('modality-select').value;
        const target = document.getElementById('protocol-select');
        if (!target) return;

        // Clear existing
        target.innerHTML = '';

        // Populate new
        protocols[mod].forEach(p => {
            const opt = document.createElement('option');
            opt.value = p.val;
            opt.text = p.text;
            if (p.val === 'dock_stuffing') opt.selected = true;
            target.appendChild(opt);
        });
    }

    function handleProtocolChange() {
        const mod = document.getElementById('modality-select').value;
        const protocol = document.getElementById('protocol-select').value;

        if (mod === 'export') {
            if (protocol === 'factory_stuffing') {
                window.location.href = 'factory-stuffing/job-create.php';
            }
        } else if (mod === 'import') {
            window.location.href = 'import/job-create.php';
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        // Initialize CKEditors for static Party fields
        const editors = ['#shipper-editor', '#consignee-editor', '#notify-editor'];
        editors.forEach(id => {
            const el = document.querySelector(id);
            if (el) {
                ClassicEditor.create(el).catch(error => console.error('Editor Sync Error:', error));
            }
        });

        // Initialize Core Protocol
        updateProtocol();
    });

    /**
     * Dynamically appends a new 2-row commodity block to the manifest table
     */
    function addItem() {
        manifestItemCount++;
        const sNo = manifestItemCount.toString().padStart(2, '0');
        const tbody = document.getElementById('manifest-body');

        if (!tbody) return console.error('Critical Error: Manifest body grid not found');

        const newBlock = `
            <tr>
                <td align="center" rowspan="2" style="border: 2px solid #000;"><input type="text" name="t_sr_r[]" class="data-input" value="${sNo}"></td>
                <td rowspan="2" style="border: 2px solid #000;"><textarea name="t_desc[]" rows="4" class="data-input" style="text-align: left; font-size: 11px;"></textarea></td>
                <td rowspan="2" style="border: 2px solid #000;"><input type="text" name="t_hsn[]" class="data-input"></td>
                <td colspan="3" style="border: 2px solid #000; padding: 0; background: #ffffff;">
                    <input type="text" name="t_cat[]" class="cat-label" placeholder="PRODUCT CATEGORY" style="text-align: center; height: 32px;">
                </td>
            </tr>
            <tr>
                <td style="border: 2px solid #000;"><input type="text" name="t_bags[]" class="data-input" placeholder="BAGS"></td>
                <td style="border: 2px solid #000;"><input type="text" name="t_qty[]" class="data-input" placeholder="QTY"></td>
                <td style="border: 2px solid #000;"><input type="text" name="t_nw[]" class="data-input" placeholder="WEIGHT"></td>
            </tr>`;

        tbody.insertAdjacentHTML('beforeend', newBlock);
    }

    function startScan() {
        Swal.fire({
            title: 'Deep Sync Initiated',
            text: 'Extracting strategic parameters from asset...',
            icon: 'info',
            timer: 2000,
            showConfirmButton: false
        });
    }
</script>

<?php include 'includes/footer.php'; ?>