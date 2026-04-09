<?php
$path_prefix = "../";
$is_root = false;
include $path_prefix . 'includes/header.php';
?>
<?php include $path_prefix . 'includes/sidebar.php'; ?>

<style>
    .onboard-hub {
        padding: 40px;
        background: #fff;
    }

    /* Minimalist Stepper */
    .minimal-stepper {
        display: flex;
        gap: 40px;
        margin-bottom: 50px;
        border-bottom: 1px solid #f1f5f9;
        padding-bottom: 15px;
    }

    .m-step {
        font-size: 11px;
        font-weight: 800;
        color: #94a3b8;
        text-transform: uppercase;
        letter-spacing: 1px;
        position: relative;
        padding-bottom: 15px;
    }

    .m-step.completed {
        color: #059669;
    }

    .m-step.active {
        color: var(--primary);
    }

    .m-step.active::after {
        content: '';
        position: absolute;
        bottom: -1px;
        left: 0;
        width: 100%;
        height: 2px;
        background: var(--primary);
    }

    .s-label {
        font-size: 10px;
        font-weight: 900;
        color: #94a3b8;
        text-transform: uppercase;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .input-simple {
        width: 100%;
        border: 1px solid #e2e8f0;
        border-radius: 6px;
        padding: 14px 18px;
        font-size: 13px;
        font-weight: 700;
        color: #1e293b;
        background: #fcfdfe;
        transition: all 0.3s;
    }

    .input-simple:focus {
        border-color: var(--primary);
        outline: none;
        background: #fff;
        box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.05);
    }

    .section-title {
        font-size: 11px;
        font-weight: 950;
        color: #1e293b;
        text-transform: uppercase;
        margin-bottom: 30px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .section-title::before {
        content: '';
        width: 3px;
        height: 14px;
        background: #059669;
        border-radius: 10px;
    }

    .doc-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        margin-top: 10px;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        overflow: hidden;
    }

    .doc-table th {
        padding: 15px;
        background: #f8fafc;
        font-size: 10px;
        font-weight: 800;
        color: #475569;
        text-transform: uppercase;
        text-align: left;
        border-bottom: 2px solid #e2e8f0;
    }

    .doc-table td {
        padding: 18px 15px;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
        font-size: 12px;
        font-weight: 700;
        color: #1e293b;
    }

    .btn-upload {
        cursor: pointer;
        color: #2563eb;
        font-size: 12px;
        background: #eff6ff;
        padding: 10px 20px;
        border-radius: 6px;
        font-weight: 900;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.2s;
        border: 1px solid #dbeafe;
    }
</style>

<main class="main-area">
    <header class="header" style="border-bottom: 1px solid #f1f5f9; background: #fff; padding: 25px 60px;">
        <div>
            <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 5px;">
                <span style="padding: 4px 10px; background: #ecfdf5; color: #059669; font-size: 9px; font-weight: 900; border-radius: 4px; text-transform: uppercase;">Final Seal</span>
                <p style="font-size: 10px; color: #94a3b8; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;" id="disp-job-meta">STAGE 06 • RECOGNIZING LIFECYCLE DEPARTURE</p>
            </div>
            <h1 class="page-title" style="font-size: 22px; font-weight: 950; letter-spacing: -1px;">On-Board <span style="color: #059669;">Confirmation</span></h1>
        </div>
        <div style="display: flex; gap: 15px;">
            <button onclick="window.history.back()" class="btn" style="background:#fff; border: 1px solid #e2e8f0; color: #64748b; font-size: 11px; font-weight: 800;">EDIT ARRIVAL</button>
            <button onclick="finishShipment()" class="btn" style="background: var(--primary); color: #fff; padding: 12px 35px; font-size: 11px; font-weight: 800; border-radius: 6px;">COMPLETE SHIPMENT</button>
        </div>
    </header>

    <div class="onboard-hub">
        <!-- 1. Minimal Stepper -->
        <div class="minimal-stepper">
            <div class="m-step completed">01. FACTORY ENTRY</div>
            <div class="m-step completed">02. LOADING CARGO</div>
            <div class="m-step completed">03. CHECKLIST</div>
            <div class="m-step completed">04. GATE IN</div>
            <div class="m-step completed">05. BOOKING</div>
            <div class="m-step active">06. ONBOARD</div>
        </div>

        <!-- 2. Vessel & Departure Details -->
        <div class="section-title">Carrier Deployment & Departure Details</div>
        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 40px 60px; margin-bottom: 60px;">
            <div class="field-group">
                <label class="s-label"><i class="fa-solid fa-ship"></i> Ocean Vessel Name</label>
                <input type="text" id="vessel-name" class="input-simple" placeholder="E.G. OSAKA EXPRESS" style="font-weight: 900; text-transform: uppercase; color: var(--primary);">
            </div>
            <div class="field-group">
                <label class="s-label"><i class="fa-solid fa-hashtag"></i> Voyage / Rotation Number</label>
                <input type="text" id="voyage-no" class="input-simple" placeholder="E.G. V-77249" style="font-weight: 900;">
            </div>
            <div class="field-group">
                <label class="s-label"><i class="fa-solid fa-calendar-day"></i> Departure Date (ETD)</label>
                <input type="date" class="input-simple" value="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="field-group">
                <label class="s-label"><i class="fa-solid fa-clock"></i> Departure Time</label>
                <input type="time" class="input-simple" value="16:00">
            </div>
        </div>

        <!-- 3. Documentation Registry -->
        <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 20px;">
            <div class="section-title" style="margin-bottom: 0;">Final Digital Asset Registry</div>
            <button onclick="addDoc()" class="btn" style="background:#fff; border: 1.5px solid #2563eb; color: #2563eb; font-size: 11px; font-weight: 900; padding: 10px 20px; border-radius: 6px;">+ ADD FINAL ASSET</button>
        </div>

        <table class="doc-table">
            <thead>
                <tr>
                    <th width="80">SNo.</th>
                    <th>Document Asset Name</th>
                    <th width="400">File Attachment</th>
                    <th width="80" style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody id="doc-registry">
                <tr>
                    <td style="font-size: 12px; font-weight: 900; color: #94a3b8; text-align: center;">01</td>
                    <td><input type="text" class="input-simple" value="MASTER BILL OF LADING" style="font-weight: 900; border: none; background: transparent; padding: 5px;"></td>
                    <td>
                        <div style="display: flex; align-items: center; gap: 15px;">
                            <label class="btn-upload">
                                <i class="fa-solid fa-cloud-arrow-up"></i> BROWSE MBL
                                <input type="file" hidden onchange="this.parentElement.nextElementSibling.innerText = this.files[0].name; this.parentElement.nextElementSibling.style.color = '#059669'">
                            </label>
                            <span style="font-size: 10px; font-weight: 900; color: #cbd5e1; text-transform: uppercase;">Awaiting Attachment</span>
                        </div>
                    </td>
                    <td align="center"><i class="fa-solid fa-trash-can" style="color: #fca5a5; cursor: pointer; font-size: 16px;" onclick="this.closest('tr').remove()"></i></td>
                </tr>
                <tr>
                    <td style="font-size: 12px; font-weight: 900; color: #94a3b8; text-align: center;">02</td>
                    <td><input type="text" class="input-simple" value="VGM CERTIFICATE (FINAL)" style="font-weight: 900; border: none; background: transparent; padding: 5px;"></td>
                    <td>
                        <div style="display: flex; align-items: center; gap: 15px;">
                            <label class="btn-upload">
                                <i class="fa-solid fa-cloud-arrow-up"></i> BROWSE VGM
                                <input type="file" hidden onchange="this.parentElement.nextElementSibling.innerText = this.files[0].name; this.parentElement.nextElementSibling.style.color = '#059669'">
                            </label>
                            <span style="font-size: 10px; font-weight: 900; color: #cbd5e1; text-transform: uppercase;">Awaiting Attachment</span>
                        </div>
                    </td>
                    <td align="center"><i class="fa-solid fa-trash-can" style="color: #fca5a5; cursor: pointer; font-size: 16px;" onclick="this.closest('tr').remove()"></i></td>
                </tr>
            </tbody>
        </table>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const rawData = localStorage.getItem('currentFactoryJob');
        if (rawData) {
            const job = JSON.parse(rawData);
            document.getElementById('vessel-name').value = job.vesselName || '';
            document.getElementById('voyage-no').value = job.voyageNo || '';
            document.getElementById('disp-job-meta').innerText = `STAGE 05 • JOB ID: ${job.jobId} • LOGISTICS SYNCED`;
        }
    });

    let dCount = 2;

    function addDoc() {
        dCount++;
        const target = document.getElementById('doc-registry');
        const tr = document.createElement('tr');
        tr.innerHTML = `
        <td style="font-size: 12px; font-weight: 900; color: #94a3b8; text-align: center;">${dCount < 10 ? '0' + dCount : dCount}</td>
        <td><input type="text" class="input-simple" placeholder="E.G. CUSTOMS RELEASE" style="font-weight: 900; border: none; background: transparent; padding: 5px;"></td>
        <td>
            <div style="display: flex; align-items: center; gap: 15px;">
                <label class="btn-upload">
                    <i class="fa-solid fa-cloud-arrow-up"></i> BROWSE FILE
                    <input type="file" hidden onchange="this.parentElement.nextElementSibling.innerText = this.files[0].name; this.parentElement.nextElementSibling.style.color = '#059669'">
                </label>
                <span style="font-size: 10px; font-weight: 900; color: #cbd5e1; text-transform: uppercase;">Awaiting Attachment</span>
            </div>
        </td>
        <td align="center"><i class="fa-solid fa-trash-can" style="color: #fca5a5; cursor: pointer; font-size: 16px;" onclick="this.closest('tr').remove()"></i></td>
    `;
        target.appendChild(tr);
    }

    function finishShipment() {
        Swal.fire({
            title: 'Shipment Successfully On-Board',
            text: 'The Factory Stuffing operational lifecycle is now completed and archived in the logistics hub.',
            icon: 'success',
            confirmButtonColor: '#000',
            confirmButtonText: 'Archive & Close'
        }).then(() => {
            window.location.href = '../work-assignment.php';
        });
    }
</script>

<?php include $path_prefix . 'includes/footer.php'; ?>