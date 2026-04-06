<?php
$path_prefix = "../";
$is_root = false;
include $path_prefix . 'includes/header.php';
?>
<?php include $path_prefix . 'includes/sidebar.php'; ?>

<!-- MAIN AREA START -->
<main class="main-area">
    <header class="header" style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 20px 40px; position: sticky; top: 0; z-index: 1000; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <span style="font-size: 9px; font-weight: 600; color: #64748b; text-transform: uppercase; letter-spacing: 1px; display: block; margin-bottom: 4px;">OPERATIONAL STAGE 01: IMPORT INITIALIZATION</span>
            <h1 class="page-title" style="font-size: 18px; font-weight: 600; margin: 0; color: #0f172a;">Global Import De-stuffing Hub</h1>
            <p style="font-size: 11px; color: #94a3b8; font-weight: 400; margin-top: 2px;">Normal Operational Manifest • B/L Sync Engine</p>
        </div>
        <div style="display: flex; gap: 15px; align-items: center;">
            <div style="text-align: right; border-right: 1px solid #f1f5f9; padding-right: 20px;">
                <p style="font-size: 9px; font-weight: 600; color: #94a3b8; text-transform: uppercase; margin: 0;">TERMINAL PORT</p>
                <p style="font-size: 10px; color: #10b981; font-weight: 600; margin: 0;">MUNDRA (LIVE)</p>
            </div>
            <button type="button" class="btn" style="background: #f8fafc; color: #64748b; font-size: 10px; font-weight: 600; padding: 10px 20px; border-radius: 6px; border: 1px solid #e2e8f0;">UPLOAD B/L</button>
        </div>
    </header>

    <div class="content-padding">
        <form id="import-hub-form" action="job-assign-slip.php" method="POST">

            <!-- 1. SHIPMENT CORE DETAILS -->
            <div class="form-section">
                <h3 class="section-title" style="font-weight: 500;"><i class="fa-solid fa-file-invoice"></i> Shipment Core Details</h3>
                <div style="display: grid; grid-template-columns: 1fr 1.5fr 1fr 1fr; gap: 24px;">
                    <div class="form-group"><label>Job ID</label><input type="text" readonly value="OCM-IMP-24-001" class="form-input" style="background:#f1f5f9; font-weight: 100; color:var(--primary);"></div>
                    <div class="form-group"><label>ADD Client</label>
                        <select class="form-input" style="font-weight: 100; border-color: var(--primary);">
                            <option>B P SPICES 208, UNJHA</option>
                            <option>Select Account...</option>
                        </select>
                    </div>
                    <div class="form-group"><label>Modality</label>
                        <select class="form-input" style="font-weight: 100;">
                            <option>IMPORT</option>
                            <option>EXPORT</option>
                        </select>
                    </div>
                    <div class="form-group"><label>Operational Protocol</label>
                        <select class="form-input" style="font-weight: 100;">
                            <option>DOCK IMPORT</option>
                            <option>FACTORY IMPORT</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- 2. AI EXTRACTION HUB -->
            <div class="extraction-header">
                <h3 style="font-size: 1.125rem; font-weight: 800; color: var(--text-main); margin-bottom: 16px;">Scan Document to Fetch Data</h3>
                <div style="display: flex; gap: 16px;">
                    <input type="file" class="form-input" style="background: white; flex: 1;">
                    <button type="button" class="btn" style="background: var(--primary); color: #fff; padding: 0 40px; border-radius: 12px; font-weight: 100; border: none; font-size: 11px;">
                        <i class="fa-solid fa-bolt"></i> START DEEP SYNC
                    </button>
                </div>
            </div>

            <div class="grid-custom">
                <!-- LEFT PILLAR: PARTY MAPPING -->
                <div>
                    <div class="form-section">
                        <h3 class="section-title"><i class="fa-solid fa-building"></i> Consignee (Final Release Party)</h3>
                        <textarea id="consignee-editor" style="height: 250px;" name="consignee_data" class="form-input">B P SPICES 208, APMC BUILDING, MARKET YARD, UNJHA- 384170 GUJARAT, INDIA
GST: 24AAPFB0517Q1Z7 IEC: 0817503331 PAN NO. – AAPFB0517Q
Mail: bpspices@yahoo.com</textarea>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 25px;">
                        <div class="form-section" style="margin-bottom: 0;">
                            <h3 class="section-title"><i class="fa-solid fa-ship"></i> Shipper (Exporter)</h3>
                            <textarea id="shipper-editor" style="height: 200px;" name="shipper_data" class="form-input">LLC "RUSAGROTRADE" RUSSIAN FEDERATION, 115419, MOSCOW, VN.TER.G.MUNITCIPALNIY OKRUG DONSKOI, 2-J ROSHHINSKIJ PROEZD, D.8, POMESH. 6/12</textarea>
                        </div>
                        <div class="form-section" style="margin-bottom: 0;">
                            <h3 class="section-title"><i class="fa-solid fa-bullhorn"></i> Notify Party</h3>
                            <textarea id="notify-editor" style="height: 200px;" name="notify_data" class="form-input">ADROIT OVERSEAS PTE LTD 10 ANSON ROAD, 18- 17 INTERNATIONAL PLAZA, SINGAPORE 079903</textarea>
                        </div>
                    </div>
                </div>

                <!-- RIGHT PILLAR: TERMINAL LOGISTICS & FINANCE -->
                <div>
                    <div class="form-section">
                        <h3 class="section-title"><i class="fa-solid fa-route"></i> Manifest Parameters</h3>
                        <div class="sub-grid" style="grid-template-columns: 1fr; gap: 12px; margin-bottom: 20px;">
                            <div class="form-group"><label>Grounding Location (CFS Hub)</label><input type="text" value="XYZ CFS MUNDRA (HUB)" class="form-input" style="border-color: var(--primary); font-weight: 100;"></div>
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                                <div class="form-group"><label>Vessel Name</label><input type="text" class="form-input" value="URANUS" style="font-weight: 100;"></div>
                                <div class="form-group"><label>Voyage No</label><input type="text" class="form-input" value="2443S" style="font-weight: 100;"></div>
                            </div>
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                                <div class="form-group"><label>Port of Loading</label><input type="text" class="form-input" value="NOVOROSSIYSK, RUSSIA" style="font-weight: 100;"></div>
                                <div class="form-group"><label>Port of Discharge</label><input type="text" class="form-input" value="MUNDRA, INDIA" style="font-weight: 100;"></div>
                            </div>
                        </div>

                        <h3 class="section-title" style="border-color: #ef4444;"><i class="fa-solid fa-money-check-dollar"></i> Port Charge Matrix (Estimated)</h3>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                            <div class="form-group"><label style="font-size: 9px; font-weight: 100;">Survey Charges</label><input type="text" value="1800 / 40ftHC" class="form-input" style="font-weight: 100;"></div>
                            <div class="form-group"><label style="font-size: 9px; font-weight: 100;">THC at POD</label><input type="text" value="21000 / 40ftHC" class="form-input" style="font-weight: 100;"></div>
                            <div class="form-group"><label style="font-size: 9px; font-weight: 100;">Import DO Fees</label><input type="text" value="5000 / BL" class="form-input" style="font-weight: 100;"></div>
                            <div class="form-group"><label style="font-size: 9px; font-weight: 100;">Documentation</label><input type="text" value="2500 / 40ftHC" class="form-input" style="font-weight: 100;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 5. IMPORT COMMERCIAL MANIFEST (NORMALIZED) -->
            <div class="card" style="padding: 30px; margin-top: 30px; border-radius: 12px; border: 1px solid #e2e8f0; background: #fff;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h3 style="font-size: 13px; font-weight: 600; color: #01172a; margin: 0; text-transform: uppercase;"><i class="fa-solid fa-boxes-stacked"></i> Commercial Manifest</h3>
                    <div style="display: flex; gap: 10px; align-items: center;">
                        <button type="button" onclick="syncJobManifest(5)" class="btn" style="background: #fff; color: #10b981; font-size: 10px; font-weight: 600; padding: 8px 15px; border-radius: 4px; border: 1px solid #10b981;">SYNC B/L</button>
                        <button type="button" onclick="addItem()" class="btn" style="background: #3b82f6; color: #fff; font-size: 10px; font-weight: 600; padding: 8px 15px; border-radius: 4px; border: none;">ADD UNIT</button>
                    </div>
                </div>

                <div style="overflow-x: auto; border: 1px solid #e2e8f0; border-radius: 8px;">
                    <table style="width: 100%; border-collapse: collapse; min-width: 3000px; text-align: center;">
                        <thead style="background: #f8fafc; border-bottom: 1px solid #e2e8f0;">
                            <tr>
                                <th width="50" style="padding: 12px; font-size: 9px; font-weight: 600; color: #64748b; text-transform: uppercase;">SR.</th>
                                <th width="180" style="padding: 12px; font-size: 9px; font-weight: 600; color: #64748b; text-transform: uppercase; text-align: left;">CONTAINER NO</th>
                                <th width="140" style="padding: 12px; font-size: 9px; font-weight: 600; color: #64748b; text-transform: uppercase;">SEAL ID</th>
                                <th width="120" style="padding: 12px; font-size: 9px; font-weight: 600; color: #64748b; text-transform: uppercase;">TYPE</th>
                                <th width="350" style="padding: 12px; font-size: 9px; font-weight: 600; color: #64748b; text-transform: uppercase; text-align: left;">DESCRIPTION</th>
                                <th width="100" style="padding: 12px; font-size: 9px; font-weight: 600; color: #64748b; text-transform: uppercase;">HS CODE</th>
                                <th width="80" style="padding: 12px; font-size: 9px; font-weight: 600; color: #64748b; text-transform: uppercase;">PKGS</th>
                                <th width="120" style="padding: 12px; font-size: 9px; font-weight: 600; color: #64748b; text-transform: uppercase;">ACTUAL WT</th>
                                <th width="150" style="padding: 12px; font-size: 9px; font-weight: 600; color: #64748b; text-transform: uppercase;">AUDIT STATUS</th>
                                <th width="120" style="padding: 12px; font-size: 9px; font-weight: 600; color: #64748b; text-transform: uppercase;">ACTION</th>
                            </tr>
                        </thead>
                        <tbody id="manifest-body">
                            <!-- Items -->
                        </tbody>
                    </table>
                </div>
            </div>

            <div style="display: flex; justify-content: flex-end; padding: 40px 0;">
                <button type="submit" onclick="saveAndAssign(event)" class="btn" style="background: var(--primary); color: #fff; padding: 16px 80px; border-radius: 12px; font-weight: 100; border: none; box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.2);">Assign Job</button>
            </div>
        </form>
    </div>
</main>

<script>
    let manifestItemCount = 0;
    const mockContainers = [{
            id: 'TEMU8169950',
            seal: 'B163979',
            pkgs: '880',
            type: 'BAGS',
            wt: '22,044'
        },
        {
            id: 'MSCU9982116',
            seal: 'B161932',
            pkgs: '880',
            type: 'BAGS',
            wt: '22,044'
        },
        {
            id: 'FSCU9929120',
            seal: 'B163972',
            pkgs: '880',
            type: 'BAGS',
            wt: '22,044'
        },
        {
            id: 'FCIU8585463',
            seal: 'B163980',
            pkgs: '880',
            type: 'BAGS',
            wt: '22,044'
        },
        {
            id: 'ECMU9475956',
            seal: 'B163973',
            pkgs: '878',
            type: 'BAGS',
            wt: '21,994'
        }
    ];

    function saveAndAssign(e) {
        // e.preventDefault(); // Remove to allow standard POST if needed, but we use localStorage
        const job = {
            jobId: 'OCM-IMP-24-001',
            client: 'B P SPICES 24',
            vesselName: document.querySelector('input[value="URANUS"]').value,
            voyageNo: document.querySelector('input[value="2443S"]').value,
            pol: document.querySelector('input[value="NOVOROSSIYSK, RUSSIA"]').value,
            pod: document.querySelector('input[value="MUNDRA, INDIA"]').value,
            hub: document.querySelector('input[value="XYZ CFS MUNDRA (HUB)"]').value,
            items: []
        };

        const rows = document.querySelectorAll('#manifest-body tr');
        rows.forEach(row => {
            const inputs = row.querySelectorAll('input, textarea');
            if (inputs.length > 0) {
                job.items.push({
                    srNo: row.cells[0].innerText,
                    container: inputs[0].value,
                    seal: inputs[1].value,
                    pkgs: inputs[5].value,
                    type: inputs[6].value,
                    weight: inputs[7].value,
                    integrity: inputs[14].value
                });
            }
        });

        localStorage.setItem('currentImportJob', JSON.stringify(job));
    }

    document.addEventListener('DOMContentLoaded', () => {
        const editors = ['#shipper-editor', '#consignee-editor', '#notify-editor'];
        editors.forEach(id => {
            const el = document.querySelector(id);
            if (el) {
                ClassicEditor.create(el).catch(error => console.error('Editor Error:', error));
            }
        });

        syncJobManifest(5);
    });

    function getManifestRowTemplate(sNo) {
        const mock = mockContainers[parseInt(sNo) - 1] || {
            id: '',
            seal: '',
            pkgs: '',
            type: 'BAGS',
            wt: ''
        };
        return `
            <tr style="border-bottom: 1px solid #f1f5f9;">
                <td style="padding: 15px; font-weight: 500; color: #94a3b8;">${sNo}</td>
                <td style="padding: 15px; text-align: left;"><input type="text" name="t_cntr[]" class="form-input" value="${mock.id}" style="border: none; background: transparent; font-weight: 600; color: #2563eb; width: 100%; padding: 0;"></td>
                <td style="padding: 15px;"><input type="text" name="t_seal[]" class="form-input" value="${mock.seal}" style="border: none; background: transparent; width: 100%; padding: 0; text-align: center;"></td>
                <td style="padding: 15px; font-size: 11px; color: #64748b;">40FT HC</td>
                <td style="padding: 15px; text-align: left;"><textarea name="t_desc[]" rows="1" class="form-input" style="border: none; background: transparent; width: 100%; padding: 0; resize: none;">CORIANDER SEEDS</textarea></td>
                <td style="padding: 15px;"><input type="text" name="t_hsn[]" class="form-input" value="090921" style="border: none; background: transparent; width: 100%; padding: 0; text-align: center;"></td>
                <td style="padding: 15px;"><input type="text" name="t_pkgs[]" class="form-input" value="${mock.pkgs}" style="border: none; background: transparent; width: 100%; padding: 0; text-align: center;"></td>
                <td style="padding: 15px;"><input type="text" name="t_wt[]" class="form-input" value="${mock.wt}" style="border: none; background: transparent; font-weight: 600; width: 100%; padding: 0; text-align: center;"></td>
                <td style="padding: 15px;"><span style="font-size: 10px; font-weight: 600; color: #10b981; background: #ecfdf5; padding: 4px 10px; border-radius: 100px;">SEAL INTACT</span></td>
                <td style="padding: 15px;">
                    <button type="button" onclick="removeItem(this)" style="border:none; background:transparent; color:#94a3b8;"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>`;
    }

    function syncJobManifest(qty) {
        const target = parseInt(qty) || 0;
        const tbody = document.getElementById('manifest-body');
        if (!tbody) return;
        const current = tbody.querySelectorAll('tr').length;

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
        manifestItemCount = target > 0 ? target : 0;
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

    function removeItem(btn) {
        btn.closest('tr').remove();
        manifestItemCount--;
        const totalInput = document.getElementById('total-containers');
        if (totalInput) totalInput.value = manifestItemCount;
    }
</script>

<?php include $path_prefix . 'includes/footer.php'; ?>