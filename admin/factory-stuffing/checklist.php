<?php
$path_prefix = "../";
$is_root = false;
include $path_prefix . 'includes/header.php';
?>
<?php include $path_prefix . 'includes/sidebar.php'; ?>

<style>
    .checklist-hub {
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

    /* Modern Simple Table */
    .simple-table {
        width: 100%;
        border-collapse: collapse;
    }

    .simple-table th {
        padding: 12px 15px;
        background: #f8fafc;
        font-size: 10px;
        font-weight: 800;
        color: #475569;
        text-transform: uppercase;
        text-align: left;
        border-bottom: 1px solid #e2e8f0;
    }

    .simple-table td {
        padding: 15px 15px;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
    }

    .simple-table tr:hover {
        background: #fcfdfe;
    }

    .input-simple {
        width: 100%;
        border: 1px solid #e2e8f0;
        border-radius: 4px;
        padding: 8px 10px;
        font-size: 11px;
        font-weight: 600;
        color: #1e293b;
        background: #fff;
    }

    .input-simple:focus {
        border-color: var(--primary);
        outline: none;
    }

    .check-box {
        width: 18px;
        height: 18px;
        cursor: pointer;
        accent-color: var(--primary);
    }

    /* Inspector Card */
    .audit-bar {
        background: #f8fafc;
        padding: 25px;
        border-radius: 8px;
        margin-top: 40px;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
        border: 1px solid #e2e8f0;
    }
</style>

<main class="main-area">
    <header class="header" style="border-bottom: 1px solid #f1f5f9; background: #fff; padding: 20px 40px;">
        <div>
            <h1 class="page-title" style="font-size: 18px; font-weight: 900;">Factory Stuffing Checklist</h1>
            <p style="font-size: 10px; color: #64748b; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;">STAGE 02: DOCUMENT VERIFICATION | AUDIT-READY</p>
        </div>
        <div style="display: flex; gap: 15px;">
            <button onclick="window.history.back()" class="btn" style="background:#fff; border: 1px solid #e2e8f0; color: #64748b; font-size: 11px; font-weight: 800;">BACK</button>
            <button onclick="submitChecklist()" class="btn btn-primary" style="padding: 10px 25px; font-size: 11px; font-weight: 800;">APPROVE & PROCEED</button>
        </div>
    </header>

    <div class="checklist-hub">
        <!-- 1. Minimalist Stepper -->
        <div class="minimal-stepper">
            <div class="m-step completed">01. JOB CREATE</div>
            <div class="m-step active">02. CHECKLIST</div>
            <div class="m-step">03. GATE IN</div>
            <div class="m-step">04. ONBOARD</div>
        </div>

        <!-- 2. Checklist Table -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
            <h3 style="font-size: 12px; font-weight: 900; color: #1e293b; text-transform: uppercase;">Required Documents</h3>
            <button onclick="addItem()" class="btn btn-primary" style="font-size: 10px; padding: 5px 15px;">+ ADD ASSET</button>
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
                    <td align="center"><span class="pill-modern" style="background: #fef3c7; color: #92400e;">PENDING</span></td>
                    <td align="right"></td>
                </tr>
                <tr>
                    <td style="font-size: 11px; font-weight: 800; color: #94a3b8;">02</td>
                    <td><input type="text" class="input-simple" value="Shipping Bill (Draft)" style="font-weight: 700; font-size: 12px;"></td>
                    <td align="center">
                        <label title="Upload" style="cursor: pointer; color: var(--primary); font-size: 14px;"><i class="fa-solid fa-cloud-arrow-up"></i><input type="file" hidden></label>
                        <span style="font-size: 9px; color: #94a3b8; margin-left: 8px;">No File</span>
                    </td>
                    <td align="center"><span class="pill-modern" style="background: #fef3c7; color: #92400e;">PENDING</span></td>
                    <td align="right"></td>
                </tr>
                <tr>
                    <td style="font-size: 11px; font-weight: 800; color: #94a3b8;">03</td>
                    <td><input type="text" class="input-simple" value="Lorry Receipt (LR Copy)" style="font-weight: 700; font-size: 12px;"></td>
                    <td align="center">
                        <label title="Upload" style="cursor: pointer; color: var(--primary); font-size: 14px;"><i class="fa-solid fa-cloud-arrow-up"></i><input type="file" hidden></label>
                        <span style="font-size: 9px; color: #94a3b8; margin-left: 8px;">No File</span>
                    </td>
                    <td align="center"><span class="pill-modern" style="background: #fef3c7; color: #92400e;">PENDING</span></td>
                    <td align="right"></td>
                </tr>
            </tbody>
        </table>

        <!-- 3. Audit Details -->
        <div class="audit-bar">
            <div>
                <label class="s-label" style="font-size: 9px; font-weight: 800; color: #64748b; text-transform: uppercase;">DATE OF VERIFICATION</label>
                <input type="date" class="input-simple" value="<?php echo date('Y-m-d'); ?>" style="margin-top: 5px;">
            </div>
            <div>
                <label class="s-label" style="font-size: 9px; font-weight: 800; color: #64748b; text-transform: uppercase;">INSPECTOR / AUDITOR</label>
                <input type="text" class="input-simple" placeholder="ENTER NAME" style="text-transform: uppercase; margin-top: 5px;">
            </div>
        </div>
    </div>
</main>

<script>
    let itemCount = 3;

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
            <td align="center"><span class="pill-modern" style="background: #fef3c7; color: #92400e;">PENDING</span></td>
            <td align="right">
                <button onclick="this.closest('tr').remove();" style="border:none; background:transparent; color: #cbd5e1; cursor:pointer;"><i class="fa-solid fa-trash-can"></i></button>
            </td>
        `;
        tbody.appendChild(row);
    }

    function submitChecklist() {
        Swal.fire({
            title: 'Verification Complete',
            text: 'Compliance documents verified for the Factory Stuffing job. Redirecting to Gate-in stage.',
            icon: 'success',
            confirmButtonColor: '#2563eb',
            confirmButtonText: 'Next: Gate-in'
        }).then(() => {
            window.location.href = 'booking.php';
        });
    }
</script>

<?php include $path_prefix . 'includes/footer.php'; ?>