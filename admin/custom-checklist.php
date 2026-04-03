<?php
$path_prefix = "";
$is_root = false;
include 'includes/header.php';
?>
<?php include 'includes/sidebar.php'; ?>

<style>
    .checklist-hub { padding: 40px; background: #fff; }
    
    /* Minimalist Stepper */
    .minimal-stepper { display: flex; gap: 40px; margin-bottom: 50px; border-bottom: 1px solid #f1f5f9; padding-bottom: 15px; }
    .m-step { font-size: 11px; font-weight: 800; color: #94a3b8; text-transform: uppercase; letter-spacing: 1px; position: relative; padding-bottom: 15px; }
    .m-step.completed { color: #059669; }
    .m-step.active { color: var(--primary); }
    .m-step.active::after { content: ''; position: absolute; bottom: -1px; left: 0; width: 100%; height: 2px; background: var(--primary); }

    /* Modern Simple Table */
    .simple-table { width: 100%; border-collapse: collapse; }
    .simple-table th { padding: 12px 15px; background: #f8fafc; font-size: 10px; font-weight: 800; color: #475569; text-transform: uppercase; text-align: left; border-bottom: 1px solid #e2e8f0; }
    .simple-table td { padding: 15px 15px; border-bottom: 1px solid #f1f5f9; vertical-align: middle; }
    .simple-table tr:hover { background: #fcfdfe; }
    
    .input-simple { width: 100%; border: 1px solid #e2e8f0; border-radius: 4px; padding: 8px 10px; font-size: 11px; font-weight: 600; color: #1e293b; background: #fff; }
    .input-simple:focus { border-color: var(--primary); outline: none; }
    
    .check-box { width: 18px; height: 18px; cursor: pointer; accent-color: var(--primary); }
    
    /* Inspector Card */
    .audit-bar { background: #f8fafc; padding: 25px; border-radius: 8px; margin-top: 40px; display: grid; grid-template-columns: repeat(2, 1fr); gap: 30px; border: 1px solid #e2e8f0; }
</style>

<main class="main-area">
    <header class="header" style="border-bottom: 1px solid #f1f5f9; background: #fff; padding: 20px 40px;">
        <div>
            <h1 class="page-title" style="font-size: 18px; font-weight: 900;">Document Checklist</h1>
            <p style="font-size: 10px; color: #64748b; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;">JOB: OCM-EXP-24-001 | PHASE: CHECKLIST</p>
        </div>
        <div style="display: flex; gap: 15px;">
            <button onclick="window.location.href='job-status.php'" class="btn" style="background:#fff; border: 1px solid #e2e8f0; color: #64748b; font-size: 11px; font-weight: 800;">BACK</button>
            <button onclick="submitChecklist()" class="btn btn-primary" style="padding: 10px 25px; font-size: 11px; font-weight: 800;">SAVE & FINISH</button>
        </div>
    </header>

    <div class="checklist-hub">
        <!-- 1. Minimalist Stepper -->
        <div class="minimal-stepper">
            <div class="m-step completed">01. CARTING</div>
            <div class="m-step active">02. CHECKLIST</div>
            <div class="m-step">03. BOOKING</div>
            <div class="m-step">04. GATE IN</div>
            <div class="m-step">05. ONBOARD</div>
        </div>

        <!-- 2. Checklist Table -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
            <h3 style="font-size: 12px; font-weight: 900; color: #1e293b; text-transform: uppercase;">Upload Documents</h3>
            <button onclick="addItem()" class="btn btn-primary" style="font-size: 10px; padding: 5px 15px;">+ ADD NEW ITEM</button>
        </div>

        <table class="simple-table">
            <thead>
                <tr>
                    <th width="50">#</th>
                    <th width="450">DOCUMENT NAME</th>
                    <th width="200" align="center">UPLOAD</th>
                    <th width="150" align="center">STATUS</th>
                    <th width="60" style="text-align: right;"></th>
                </tr>
            </thead>
            <tbody id="checklist-body">
                <tr>
                    <td style="font-size: 11px; font-weight: 800; color: #94a3b8;">01</td>
                    <td><input type="text" class="input-simple" value="Invoice & Packing List" style="font-weight: 700; font-size: 12px;"></td>
                    <td align="center">
                        <label title="Upload" style="cursor: pointer; color: var(--primary); font-size: 14px;"><i class="fa-solid fa-cloud-arrow-up"></i><input type="file" hidden></label>
                        <span style="font-size: 9px; color: #94a3b8; margin-left: 8px;">No File</span>
                    </td>
                    <td align="center"><span class="pill-modern">PENDING</span></td>
                    <td align="right"></td>
                </tr>
            </tbody>
        </table>

        <!-- 3. Audit Details -->
        <div class="audit-bar">
            <div>
                <label class="s-label" style="font-size: 9px; font-weight: 800; color: #64748b; text-transform: uppercase;">DATE</label>
                <input type="date" class="input-simple" value="<?php echo date('Y-m-d'); ?>" style="margin-top: 5px;">
            </div>
            <div>
                <label class="s-label" style="font-size: 9px; font-weight: 800; color: #64748b; text-transform: uppercase;">LOCATION / CFS</label>
                <input type="text" class="input-simple" placeholder="ENTER LOCATION" style="text-transform: uppercase; margin-top: 5px;">
            </div>
        </div>
    </div>
</main>

<script>
    let itemCount = 1;

    function addItem() {
        itemCount++;
        const tbody = document.getElementById('checklist-body');
        const row = document.createElement('tr');
        row.innerHTML = `
            <td style="font-size: 11px; font-weight: 800; color: #94a3b8;">${itemCount < 10 ? '0' + itemCount : itemCount}</td>
            <td><input type="text" class="input-simple" placeholder="ENTER DOCUMENT NAME..." style="font-weight: 700; font-size: 12px;"></td>
            <td align="center">
                <label title="Upload" style="cursor: pointer; color: var(--primary); font-size: 14px;"><i class="fa-solid fa-cloud-arrow-up"></i><input type="file" hidden></label>
                <span style="font-size: 9px; color: #94a3b8; margin-left: 8px;">No File</span>
            </td>
            <td align="center"><span class="pill-modern">PENDING</span></td>
            <td align="right">
                <button onclick="this.closest('tr').remove();" style="border:none; background:transparent; color: #cbd5e1; cursor:pointer;"><i class="fa-solid fa-trash-can"></i></button>
            </td>
        `;
        tbody.appendChild(row);
    }

    function submitChecklist() {
        Swal.fire({
            title: 'Checklist Verified',
            text: 'Documents approved. Moving to Booking Confirmation stage.',
            icon: 'success',
            confirmButtonColor: '#2563eb',
            confirmButtonText: 'Next: Booking'
        }).then(() => {
            window.location.href = 'booking-status.php';
        });
    }
</script>

<?php include 'includes/footer.php'; ?>
