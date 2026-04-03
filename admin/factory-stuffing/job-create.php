<?php
$path_prefix = "../";
$is_root = false;
include $path_prefix . 'includes/header.php';
?>
<?php include $path_prefix . 'includes/sidebar.php'; ?>

<!-- MAIN AREA START -->
<main class="main-area">
    <header class="header">
        <div>
            <h1 class="page-title">Create Factory Stuffing Job</h1>
            <p style="font-size: 11px; color: var(--text-muted); font-weight: 600;">Direct Loading & Terminal Handover Protocol</p>
        </div>
    </header>

    <div class="content-padding">
        <form id="master-form" action="checklist.php" method="POST">

            <!-- 1. SHIPMENT CORE -->
            <div class="form-section">
                <h3 class="section-title" style="font-weight: 500;"><i class="fa-solid fa-id-card"></i> Shipment Core Details</h3>
                <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px;">
                    <div class="form-group"><label>Job ID</label><input type="text" id="job-id" name="job_id" readonly value="OCM-FAC-24-001" class="form-input" style="background:#f1f5f9; color:var(--primary);"></div>
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
                            <option value="factory_stuffing" selected>FACTORY STUFFING</option>
                            <option value="dock_stuffing">DOCK STUFFING</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- 2. AI HUB (EXACT COPY) -->
            <div class="extraction-header">
                <h3 style="font-size: 1.125rem; font-weight: 800; color: var(--text-main); margin-bottom: 16px;">Scan Factory Invoice to Fetch Data</h3>
                <div style="display: flex; gap: 16px;"><input type="file" class="form-input" style="background: white; flex: 1;"><button type="button" onclick="startScan()" class="btn btn-primary" style="padding: 0 40px;"><i class="fa-solid fa-bolt"></i> START DEEP SYNC</button></div>
            </div>

            <div class="grid-custom">
                <!-- LEFT PILLAR: IDENTIFICATION & STRATEGY -->
                <div>
                    <!-- 1. PARTY MAPPING (EXACT COPY) -->
                    <div class="form-section">
                        <h3 class="section-title"><i class="fa-solid fa-user-tie"></i> Shipper (Exporter Identification)</h3>
                        <textarea id="shipper-editor" style="height: 250px;" name="shipper_data" class="form-input" placeholder="Enter Full Shipper Details (Name, Address, GST, IEC, etc.)"></textarea>
                    </div>



                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 25px;">
                        <div class="form-section" style="margin-bottom: 0;">
                            <h3 class="section-title"><i class="fa-solid fa-building"></i> Consignee</h3>
                            <textarea id="consignee-editor" style="height: 200px;" name="consignee_data" class="form-input" placeholder="Enter Consignee Details"></textarea>
                        </div>
                        <div class="form-section" style="margin-bottom: 0;">
                            <h3 class="section-title"><i class="fa-solid fa-bullhorn"></i> Notify Party</h3>
                            <textarea id="notify-editor" style="height: 200px;" name="notify_data" class="form-input" placeholder="Enter Notify Information"></textarea>
                        </div>
                    </div>
                    <div class="form-section">
                        <h3 class="section-title"><i class="fa-solid fa-truck-fast"></i> Transport Information</h3>
                        <div class="sub-grid" style="grid-template-columns: 1fr 1fr; gap: 12px;">
                            <div class="form-group" style="grid-column: span 2;"><label>Transporter Name (Carrier Account)</label>
                                <div style="display: flex; gap: 8px;">
                                    <select id="transporter-name" class="form-input" style="border-color: var(--primary);">
                                        <option value="">Select Carrier...</option>
                                        <option value="OMAN CARGO FLEET">OMAN CARGO FLEET</option>
                                        <option value="GLO TRANS LOGISTICS">GLO TRANS LOGISTICS</option>
                                        <option value="NEXUS CARRIERS">NEXUS CARRIERS</option>
                                        <option value="RELIANCE TRANSPORT">RELIANCE TRANSPORT</option>
                                    </select>
                                    <button type="button" onclick="addTransporter()" class="btn btn-secondary" style="padding: 0 10px; width: 45px;"><i class="fa-solid fa-plus"></i></button>
                                </div>
                            </div>

                            <div class="form-group"><label>Transporter Email</label><input type="email" id="trans-email" class="form-input" placeholder="DISPATCH@CARRIER.COM"></div>
                            <div class="form-group"><label>Contact</label><input type="text" id="trans-contact" class="form-input" placeholder="+968 XXXX XXXX"></div>

                            <div class="form-group"><label>Truck Qty Requested</label><input type="number" id="truck-qty" class="form-input" placeholder="0" style="background: #fff; border-color: #0ea5e9;"></div>
                            <div class="form-group"><label>Total Truck / Trailer No.</label><input type="text" id="truck-no" class="form-input" style="color: #2563eb;" placeholder="ASSIGNED PLATE NO."></div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT PILLAR: OPERATIONAL SECURITY (STRETCHED FOR SYMMETRY) -->
                <div>
                    <div class="form-section">
                        <h3 class="section-title" style="border-color: #059669;"><i class="fa-solid fa-truck-ramp-box"></i> Stuffing & Security</h3>
                        <div class="sub-grid" style="grid-template-columns: 1fr; gap: 12px; margin-bottom: 20px;">
                            <div class="form-group"><label>Factory Name</label><input type="text" id="factory-name" placeholder="FACTORY HUB" class="form-input"></div>
                            <div class="form-group"><label>Full Loading Address</label><textarea id="global-loading-address" oninput="syncLoadingAddress(this.value)" placeholder="STREET, CITY, ZIP" class="form-input" style="height: 80px;"></textarea></div>

                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                                <div class="form-group"><label>Stuffing Date</label><input type="date" class="form-input" value="<?php echo date('Y-m-d'); ?>"></div>
                                <div class="form-group"><label>Movement Route</label><input type="text" class="form-input" value="DEPOT → FACTORY → PORT" readonly style="background:#f8fafc; font-size: 10px;"></div>
                            </div>

                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                                <div class="form-group"><label>Depot Name</label><input type="text" class="form-input" placeholder="EMPTY PICKUP"></div>
                                <div class="form-group"><label>Terminal Port</label><input type="text" class="form-input" value="MUNDRA PORT"></div>
                            </div>

                            <div class="form-group"><label>Total Number of Containers</label><input type="number" id="total-containers" oninput="syncJobManifest(this.value)" class="form-input" placeholder="0" style="background: #fff; border-color: #059669; color: #059669;"></div>

                            <div class="form-group"><label>Delivery Terms</label><input type="text" value="EX-WORKS SOHAR" class="form-input"></div>
                        </div>

                        <h3 class="section-title" style="border-color: #ef4444;"><i class="fa-solid fa-clock-lock"></i> Operational Cut-offs</h3>
                        <div class="sub-grid" style="grid-template-columns: 1fr; gap: 12px;">
                            <div class="form-group"><label>VGM Cut-off</label><input type="datetime-local" class="form-input"></div>
                            <div class="form-group"><label>S/I Cut-off</label><input type="datetime-local" class="form-input"></div>
                            <div class="form-group"><label>Gate-in Deadline</label><input type="datetime-local" class="form-input"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 4. CARRIER & TERMINAL STRATEGY (FULL WIDTH HORIZONTAL) -->
            <div class="form-section">
                <h3 class="section-title"><i class="fa-solid fa-ship"></i> Carrier & Terminal Strategy</h3>
                <div class="sub-grid" style="grid-template-columns: repeat(4, 1fr); gap: 12px;">
                    <div class="form-group"><label>Invoice No.</label><input type="text" id="i-no" class="form-input" placeholder="INV-001"></div>
                    <div class="form-group"><label>Invoice Date</label><input type="text" id="i-date" class="form-input" value="<?php echo date('d-m-Y'); ?>"></div>
                    <div class="form-group"><label>Reverse Charge</label><select class="form-input">
                            <option>Not Applicable</option>
                            <option>Applicable</option>
                        </select></div>
                    <div class="form-group"><label>Supply Date</label><input type="text" class="form-input" value="<?php echo date('d-m-Y'); ?>"></div>
                    <div class="form-group"><label>Transport Mode</label><input type="text" class="form-input" value="SEA / ROAD"></div>

                    <div class="form-group"><label>P.O No.</label><input type="text" id="po-no" placeholder="PO NO" class="form-input"></div>
                    <div class="form-group"><label>P.O Date</label><input type="text" id="po-date" placeholder="PO DATE" class="form-input"></div>
                    <div class="form-group"><label>Booking No.</label><input type="text" id="booking-no" class="form-input" style="color: #2563eb;"></div>
                    <div class="form-group"><label>Shipping Line</label><input type="text" id="shipping-line" class="form-input"></div>

                    <div class="form-group"><label>Vessel Name</label><input type="text" id="vessel-name" class="form-input" placeholder="E.G. MSC BARI"></div>
                    <div class="form-group"><label>Voyage No.</label><input type="text" id="voyage-no" class="form-input" placeholder="E.G. 2401W"></div>
                    <div class="form-group"><label>Carrier Line</label><input type="text" class="form-input"></div>
                    <div class="form-group"><label>S/B NO / Date</label><input type="text" placeholder="SB-19283 / 24-03" class="form-input"></div>
                    <div class="form-group"><label>Port Code</label><input type="text" value="INMUN1" class="form-input"></div>

                    <div class="form-group"><label>Place of Receipt</label><input type="text" class="form-input"></div>
                    <div class="form-group"><label>Port of Loading (POL)</label><input type="text" value="MUNDRA, INDIA" class="form-input"></div>
                    <div class="form-group"><label>ETD (Departure)</label><input type="date" id="etd" class="form-input"></div>
                    <div class="form-group"><label>ETA (Arrival)</label><input type="date" id="eta" class="form-input"></div>

                    <div class="form-group"><label>Port of Discharge (POD)</label><input type="text" class="form-input"></div>
                    <div class="form-group"><label>Final Destination</label><input type="text" class="form-input"></div>
                </div>
            </div>

            <!-- 5. STRATEGIC COMMODITY MANIFEST (FLAT LOGISTICS LEDGER) -->
            <div class="card" style="padding: 25px; margin-top: 40px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
                    <h3 class="section-title" style="margin: 0;"><i class="fa-solid fa-boxes-stacked"></i> Export Commercial Manifest (Logistics Ledger)</h3>
                    <button type="button" onclick="addItem()" class="btn btn-secondary" style="font-size: 10px;"><i class="fa-solid fa-plus"></i> ADD NEW LINE ITEM</button>
                </div>
                <div style="overflow-x: auto; border: 1px solid #e2e8f0; border-radius: 8px;">
                    <table class="classic-table" style="min-width: 2800px; border-collapse: separate; border-spacing: 0;">
                        <thead>
                            <!-- TIER 1: LOGICAL GROUPING -->
                            <tr style="background: #f1f5f9; font-size: 9px; letter-spacing: 1px; color: #475569;">
                                <th colspan="3" style="border-bottom: 1px solid #cbd5e1; background: #fff; position: sticky; left: 0; z-index: 15; text-align: center;">GOODS INFORMATION</th>
                                <th colspan="3" style="border-bottom: 1px solid #fcd34d; background: #fef3c7; color: #92400e; text-align: center;">CONTAINER IDENTIFICATION</th>
                                <th colspan="5" style="border-bottom: 1px solid #93c5fd; background: #eff6ff; color: #1e40af; text-align: center;">FLEET & TERMINAL SCHEDULE</th>
                                <th colspan="1" style="border-bottom: 1px solid #6ee7b7; background: #ecfdf5; color: #065f46; text-align: center;">SOURCE LOADING</th>
                                <th colspan="3" style="border-bottom: 1px solid #7dd3fc; background: #f0f9ff; color: #0369a1; text-align: center;">VGM WEIGHTS (TOTAL KGS)</th>
                                <th colspan="3" style="border-bottom: 1px solid #cbd5e1; background: #f8fafc; color: #475569; text-align: center;">LORRY REGISTRY</th>
                            </tr>
                            <!-- TIER 2: INDIVIDUAL PARAMETERS -->
                            <tr style="background: #f8fafc; font-size: 10px;">
                                <th width="60" style="position: sticky; left: 0; z-index: 10; background: #f8fafc; border-right: 2px solid #e2e8f0; box-shadow: 2px 0 5px rgba(0,0,0,0.05);">Sr.</th>
                                <th width="350">Description of Goods</th>
                                <th width="140">HNS Code</th>
                                <th width="180" style="color: #ef4444; background: #fffbeb;">Container No *</th>
                                <th width="140" style="background: #fffbeb;">Size</th>
                                <th width="140" style="background: #fffbeb;">Seal No</th>
                                <th width="140" style="background: #f0f7ff;">Truck No</th>
                                <th width="140" style="background: #f0f7ff;">Pickup Date</th>
                                <th width="180" style="background: #f0f7ff;">Pickup Loc</th>
                                <th width="140" style="background: #f0f7ff;">Movement Date</th>
                                <th width="140" style="background: #f0f7ff;">Stuffing Date</th>
                                <th width="300" style="background: #f0fdf4;">Stuffing Location (Factory)</th>
                                <th width="100" style="background: #f0f9ff;">Net (KGS)</th>
                                <th width="100" style="background: #f0f9ff;">Tare (KGS)</th>
                                <th width="100" style="background: #f0f9ff;">Gross (KGS)</th>
                                <th width="150" style="background: #f8fafc;">LR Name</th>
                                <th width="150" style="background: #f8fafc;">LR Number</th>
                                <th width="200" style="background: #f8fafc;">LR Date & Doc</th>
                            </tr>
                        </thead>
                        <tbody id="manifest-body">
                            <tr>
                                <td align="center" style="position: sticky; left: 0; z-index: 5; background: #fff; border-right: 2px solid #e2e8f0; box-shadow: 2px 0 5px rgba(0,0,0,0.05);"><input type="text" name="t_sr_r[]" class="data-input" value="01"></td>
                                <td><textarea name="t_desc[]" rows="1" class="data-input" style="text-align: left; font-size: 11px;" placeholder="GOODS DESCRIPTION"></textarea></td>
                                <td><input type="text" name="t_hsn[]" class="data-input" placeholder="HNS CODE"></td>
                                <td style="background: #fffbeb;"><input type="text" name="t_cntr[]" class="data-input" placeholder="MANDATORY" style="border-bottom: 1px solid #ef4444; color: #2563eb; background: transparent;"></td>
                                <td style="background: #fffbeb;">
                                    <select name="t_size[]" class="data-input" style="background: transparent;">
                                        <option>20ft Standard</option>
                                        <option>40ft High Cube</option>
                                        <option>20ft Open Top</option>
                                    </select>
                                </td>
                                <td style="background: #fffbeb;"><input type="text" name="t_seal[]" class="data-input" placeholder="SEAL" style="background: transparent;"></td>
                                <td style="background: #f0f7ff;"><input type="text" name="t_truck[]" class="data-input" placeholder="PLATE" style="background: transparent;"></td>
                                <td style="background: #f0f7ff;"><input type="date" name="t_pdate[]" class="data-input" style="background: transparent;"></td>
                                <td style="background: #f0f7ff;"><input type="text" name="t_ploc[]" class="data-input" placeholder="DEPOT" style="background: transparent;"></td>
                                <td style="background: #f0f7ff;"><input type="date" name="t_mdate[]" class="data-input" style="background: transparent;"></td>
                                <td style="background: #f0f7ff;"><input type="date" name="t_sdate[]" class="data-input" style="background: transparent;"></td>
                                <td style="background: #f0fdf4;"><input type="text" name="t_sloc[]" class="data-input t-stuffing-loc" placeholder="AUTO-FILL ADDRESS" style="background: transparent;"></td>
                                <td style="background: #f0f9ff;"><input type="number" name="t_net[]" class="data-input" placeholder="0" style="background: transparent;"></td>
                                <td style="background: #f0f9ff;"><input type="number" name="t_tare[]" class="data-input" placeholder="0" style="background: transparent;"></td>
                                <td style="background: #f0f9ff;"><input type="number" name="t_gross[]" class="data-input" placeholder="0" style="background: transparent;"></td>
                                <td><input type="text" name="t_lr_name[]" class="data-input" placeholder="LR NAME"></td>
                                <td><input type="text" name="t_lr_no[]" class="data-input" placeholder="LR NO"></td>
                                <td>
                                    <div style="display: flex; gap: 8px; align-items: center;">
                                        <input type="date" name="t_lr_date[]" class="data-input" style="flex: 1;">
                                        <div style="position:relative;">
                                            <button type="button" class="btn btn-secondary" style="padding:4px 10px; font-size: 10px;" onclick="this.nextElementSibling.click()"><i class="fa-solid fa-file-arrow-up"></i></button>
                                            <input type="file" name="t_lr_doc[]" style="display:none;">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="18" style="background: #f8fafc; padding: 12px; font-size: 10px; color: #64748b; font-weight: 500;">
                                    TERMS OF SHIPMENT / DELIVERY
                                    <input type="text" name="f_terms" class="data-input" style="text-align: left; display: inline-block; width: 60%;" value="FOB MUNDRA">
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- 6. BANK IDENTIFICATION (EXACT COPY) -->


                <!-- 6. DECLARATION HUB -->
                <div class="form-section" style="margin-top: 20px;">
                    <h3 class="section-title"><i class="fa-solid fa-file-signature"></i> Final Declaration & Terms</h3>
                    <textarea class="form-input" style="height: 120px; font-size: 11px; line-height: 1.6; background: #fcfdfe;" readonly>We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct. The goods are of Indian Origin. All disputes are subject to the jurisdiction of the courts of Mundra, India. Under the Factory Stuffing protocol, the seal integrity is verified at the source loading point.</textarea>
                </div>

                <!-- 7. MASTER REGISTRY (EXACT COPY) -->
                <div class="form-section" style="margin-top: 20px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
                        <h3 class="section-title" style="margin: 0;"><i class="fa-solid fa-folder-tree"></i> Document Registry</h3><button type="button" onclick="addR()" class="btn btn-secondary" style="font-size: 10px;">+ REGISTER ASSET</button>
                    </div>
                    <div id="reg-hub">
                        <div class="registry-row"><input type="text" class="form-input" placeholder="Category"><input type="file" class="form-input"></div>
                    </div>
                </div>

                <div style="display: flex; justify-content: flex-end; padding: 40px 0;"><button type="button" onclick="submitJob()" class="btn btn-primary" style="padding: 16px 80px;">Assign Job</button></div>
        </form>
    </div>
</main>
<!-- MAIN AREA END -->

<script>
    let manifestItemCount = 1;

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
                val: 'factory_stuffing',
                text: 'FACTORY STUFFING'
            },
            {
                val: 'dock_stuffing',
                text: 'DOCK STUFFING'
            },
            {
                val: 'de_stuffing',
                text: 'DE-STUFFING'
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
            if (p.val === 'factory_stuffing') opt.selected = true;
            target.appendChild(opt);
        });
    }

    function handleProtocolChange() {
        const mod = document.getElementById('modality-select').value;
        const protocol = document.getElementById('protocol-select').value;

        // If user switches away from Factory Stuffing on this specialized page, redirect to main creator
        if (protocol !== 'factory_stuffing') {
            window.location.href = '../job-create.php';
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        const editors = ['#shipper-editor', '#consignee-editor', '#notify-editor'];
        editors.forEach(id => {
            const el = document.querySelector(id);
            if (el) {
                ClassicEditor.create(el).catch(error => console.error('Editor Sync Error:', error));
            }
        });

        // Trigger Sync Engine
        const totalContainersEl = document.getElementById('total-containers');
        if (totalContainersEl) {
            totalContainersEl.addEventListener('input', function() {
                syncJobManifest(this.value);
            });
        }
    });

    function getManifestRowTemplate(sNo) {
        const globalAddr = document.getElementById('global-loading-address')?.value || '';
        return `
            <tr>
                <td align="center" style="position: sticky; left: 0; z-index: 5; background: #fff; border-right: 2px solid #e2e8f0; border-bottom: 1px solid #e2e8f0; box-shadow: 2px 0 5px rgba(0,0,0,0.05);"><input type="text" name="t_sr_r[]" class="data-input" value="${sNo}"></td>
                <td><textarea name="t_desc[]" rows="1" class="data-input" style="text-align: left; font-size: 11px;" placeholder="GOODS DESCRIPTION"></textarea></td>
                <td><input type="text" name="t_hsn[]" class="data-input" placeholder="HNS CODE"></td>
                <td style="background: #fffbeb;"><input type="text" name="t_cntr[]" class="data-input" placeholder="MANDATORY" style="border-bottom: 1px solid #ef4444; color: #2563eb; background: transparent;"></td>
                <td style="background: #fffbeb;">
                    <select name="t_size[]" class="data-input" style="background: transparent;">
                        <option>20ft Standard</option>
                        <option>40ft High Cube</option>
                        <option>20ft Open Top</option>
                    </select>
                </td>
                <td style="background: #fffbeb;"><input type="text" name="t_seal[]" class="data-input" placeholder="SEAL" style="background: transparent;"></td>
                <td style="background: #f0f7ff;"><input type="text" name="t_truck[]" class="data-input" placeholder="PLATE" style="background: transparent;"></td>
                <td style="background: #f0f7ff;"><input type="date" name="t_pdate[]" class="data-input" style="background: transparent;"></td>
                <td style="background: #f0f7ff;"><input type="text" name="t_ploc[]" class="data-input" placeholder="DEPOT" style="background: transparent;"></td>
                <td style="background: #f0f7ff;"><input type="date" name="t_mdate[]" class="data-input" style="background: transparent;"></td>
                <td style="background: #f0f7ff;"><input type="date" name="t_sdate[]" class="data-input" style="background: transparent;"></td>
                <td style="background: #f0fdf4;"><input type="text" name="t_sloc[]" class="data-input t-stuffing-loc" value="${globalAddr}" placeholder="AUTO-FILL Address" style="background: transparent;"></td>
                <td style="background: #f0f9ff;"><input type="number" name="t_net[]" class="data-input" placeholder="0" style="background: transparent;"></td>
                <td style="background: #f0f9ff;"><input type="number" name="t_tare[]" class="data-input" placeholder="0" style="background: transparent;"></td>
                <td style="background: #f0f9ff;"><input type="number" name="t_gross[]" class="data-input" placeholder="0" style="background: transparent;"></td>
                <td><input type="text" name="t_lr_name[]" class="data-input" placeholder="LR NAME"></td>
                <td><input type="text" name="t_lr_no[]" class="data-input" placeholder="LR NO"></td>
                <td>
                    <div style="display: flex; gap: 8px; align-items: center;">
                        <input type="date" name="t_lr_date[]" class="data-input" style="flex: 1;">
                        <div style="position:relative;">
                            <button type="button" class="btn btn-secondary" style="padding:4px 10px; font-size: 10px;" onclick="this.nextElementSibling.click()"><i class="fa-solid fa-file-arrow-up"></i></button>
                            <input type="file" name="t_lr_doc[]" style="display:none;">
                        </div>
                    </div>
                </td>
            </tr>`;
    }

    function syncLoadingAddress(val) {
        document.querySelectorAll('.t-stuffing-loc').forEach(input => {
            input.value = val;
        });
    }

    function syncJobManifest(qty) {
        const target = parseInt(qty) || 0;
        const tbody = document.getElementById('manifest-body');
        if (!tbody) return;
        const rows = tbody.querySelectorAll('tr');
        const current = rows.length;

        if (target > current) {
            for (let i = current + 1; i <= target; i++) {
                const sNo = i.toString().padStart(2, '0');
                tbody.insertAdjacentHTML('beforeend', getManifestRowTemplate(sNo));
            }
        } else if (target < current) {
            for (let i = current; i > target; i--) {
                tbody.removeChild(tbody.lastElementChild);
            }
        }
        manifestItemCount = target > 0 ? target : 1;
    }

    function addItem() {
        manifestItemCount++;
        const sNo = manifestItemCount.toString().padStart(2, '0');
        const tbody = document.getElementById('manifest-body');
        if (!tbody) return;
        tbody.insertAdjacentHTML('beforeend', getManifestRowTemplate(sNo));
        const totalInput = document.getElementById('total-containers');
        if (totalInput) totalInput.value = manifestItemCount;
    }

    function addR() {
        const hub = document.getElementById('reg-hub');
        const row = document.createElement('div');
        row.className = 'registry-row';
        row.innerHTML = `<input type="text" class="form-input" placeholder="Category"><input type="file" class="form-input"><button type="button" onclick="this.parentElement.remove()" style="border:none; background:transparent; color:#ef4444; cursor:pointer;"><i class="fa-solid fa-circle-xmark"></i></button>`;
        hub.appendChild(row);
    }

    function startScan() {
        Swal.fire({
            title: 'Deep AI Scan',
            text: 'Extracting strategic parameters from your Booking PDF...',
            icon: 'info',
            timer: 2000,
            showConfirmButton: false
        });
    }

    function addTransporter() {
        Swal.fire({
            title: 'Add New Transporter',
            input: 'text',
            inputLabel: 'Transport Company Name',
            inputPlaceholder: 'Enter name...',
            showCancelButton: true,
            confirmButtonText: 'Register Carrier',
            confirmButtonColor: '#2563eb',
            cancelButtonColor: '#64748b'
        }).then((result) => {
            if (result.isConfirmed && result.value) {
                const select = document.getElementById('transporter-name');
                if (select) {
                    const option = document.createElement('option');
                    option.value = result.value.toUpperCase();
                    option.text = result.value.toUpperCase();
                    select.add(option);
                    select.value = option.value;
                }

                Swal.fire({
                    title: 'Carrier Added!',
                    icon: 'success',
                    timer: 1000,
                    showConfirmButton: false
                });
            }
        });
    }

    function submitJob() {
        // Core Form Validation Check
        const totalContainers = parseInt(document.getElementById('total-containers')?.value) || 0;
        if (totalContainers <= 0) {
            Swal.fire('Error', 'Please enter Total Number of Containers', 'error');
            return;
        }

        // Cut-off Alert System
        const cutoffEl = document.getElementById('cnt-cutoff');
        if (cutoffEl && cutoffEl.value) {
            const cutoffDate = new Date(cutoffEl.value);
            if (new Date() > cutoffDate) {
                Swal.fire({
                    title: 'Cut-off Alert!',
                    text: 'The Gate-in Cutoff window for this vessel has passed. Proceed with caution.',
                    icon: 'warning'
                });
            }
        }

        const getVal = (id) => {
            const el = document.getElementById(id);
            return (el && el.value.trim()) ? el.value.trim() : "TBD";
        };

        const jobData = {
            jobId: getVal('job-id'),
            bookingNo: getVal('booking-no'),
            shippingLine: getVal('shipping-line'),
            vesselName: getVal('vessel-name'),
            voyageNo: getVal('voyage-no'),
            invoiceNo: getVal('i-no'),
            invoiceDate: getVal('i-date'),
            poNo: getVal('po-no'),
            poDate: getVal('po-date'),
            factoryName: getVal('factory-name'),
            totalContainers: totalContainers,
            truckNo: getVal('truck-no'),
            transporter: getVal('transporter-name'),
            transEmail: getVal('trans-email'),
            transContact: getVal('trans-contact'),
            status: "Draft",
            items: []
        };

        // Capture Manifest Array & Critical Validations
        let validationPass = true;
        document.querySelectorAll('#manifest-body tr').forEach((row, index) => {
            const containerNo = row.querySelector('[name="t_cntr[]"]')?.value.trim() || "";
            const netWeight = parseFloat(row.querySelector('[name="t_net[]"]')?.value) || 0;
            const grossWeight = parseFloat(row.querySelector('[name="t_gross[]"]')?.value) || 0;

            // 1. Mandatory Container No Validation
            if (!containerNo) {
                Swal.fire('Validation Error', `Container No is required at Row ${index + 1}`, 'error');
                validationPass = false;
                return;
            }

            // 2. Weight Validation (Net vs Gross)
            if (netWeight > grossWeight) {
                Swal.fire('Weight Error', `Row ${index + 1}: Net Weight (${netWeight}) cannot exceed Gross Weight (${grossWeight})`, 'error');
                validationPass = false;
                return;
            }

            const rowData = {
                srNo: row.querySelector('[name="t_sr_r[]"]')?.value || '',
                desc: row.querySelector('[name="t_desc[]"]')?.value || '',
                hsn: row.querySelector('[name="t_hsn[]"]')?.value || '',
                container: containerNo,
                size: row.querySelector('[name="t_size[]"]')?.value || '',
                seal: row.querySelector('[name="t_seal[]"]')?.value.trim() || "TBD",
                truck: row.querySelector('[name="t_truck[]"]')?.value.trim() || "TBD",
                net: netWeight,
                gross: grossWeight,
                lrName: row.querySelector('[name="t_lr_name[]"]')?.value || '',
                lrNo: row.querySelector('[name="t_lr_no[]"]')?.value || ''
            };
            jobData.items.push(rowData);
        });

        if (!validationPass) return;

        localStorage.setItem('currentFactoryJob', JSON.stringify(jobData));

        Swal.fire({
            title: 'Job Synchronized!',
            text: 'Manifest validated. Generating Operational Assignment Slip...',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false
        }).then(() => {
            window.location.href = 'job-assign-slip.php';
        });
    }
</script>


<?php include $path_prefix . 'includes/footer.php'; ?>