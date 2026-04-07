<?php
$path_prefix = "";
$is_root = false;
include 'includes/header.php';
?>
<?php include 'includes/sidebar.php'; ?>

<style>
    .simple-modern-hub {
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

    /* Clean Stats Row */
    .clean-stats {
        display: flex;
        gap: 60px;
        margin-bottom: 40px;
        padding: 20px 0;
    }

    .stat-item {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .s-label {
        font-size: 10px;
        font-weight: 700;
        color: #64748b;
        text-transform: uppercase;
    }

    .s-value {
        font-size: 18px;
        font-weight: 800;
        color: #000;
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
        padding: 12px 15px;
        border-bottom: 1px solid #f1f5f9;
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

    .pill-modern {
        padding: 4px 10px;
        border-radius: 4px;
        font-size: 9px;
        font-weight: 900;
        text-transform: uppercase;
        background: #f1f5f9;
        color: #475569;
    }
</style>

<main class="main-area">
    <header class="header" style="border-bottom: 1px solid #f1f5f9; background: #fff; padding: 20px 40px;">
        <div>
            <h1 class="page-title" style="font-size: 18px; font-weight: 900;">Movement Tracking</h1>
            <p style="font-size: 10px; color: #64748b; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;">OCM-EXP-24-001 | PHASE 01: CARTING</p>
        </div>
        <div style="display: flex; gap: 15px;">
            <button onclick="window.location.href='work-assignment.php'" class="btn" style="background:#fff; border: 1px solid #e2e8f0; color: #64748b; font-size: 11px; font-weight: 800;">CANCEL</button>
            <button onclick="submitSave()" class="btn btn-primary" style="padding: 10px 25px; font-size: 11px; font-weight: 800;">SAVE PROGRESS</button>
        </div>
    </header>

    <div class="simple-modern-hub">
        <!-- 1. Minimalist Stepper -->
        <div class="minimal-stepper">
            <div class="m-step active">01. CARTING</div>
            <div class="m-step">02. CHECKLIST</div>
            <div class="m-step">03. BOOKING</div>
            <div class="m-step">04. GATE IN</div>
            <div class="m-step">05. ONBOARD</div>
        </div>

        <!-- 2. Clean Stats Row -->
        <div class="clean-stats">
            <div class="stat-item">
                <span class="s-label">Total Trucks</span>
                <span class="s-value" id="s-units">0 Units</span>
            </div>
            <div class="stat-item">
                <span class="s-label">Target Weight</span>
                <span class="s-value">24.475 MT</span>
            </div>
            <div class="stat-item">
                <span class="s-label">Loaded WT</span>
                <span class="s-value" id="s-moved" style="color: var(--primary);">0.00 MT</span>
            </div>
            <div class="stat-item">
                <span class="s-label">Balance</span>
                <span class="s-value" id="s-balance">24.475 MT</span>
            </div>
        </div>

        <!-- 3. Modern Simple Table -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
            <h3 style="font-size: 12px; font-weight: 900; color: #1e293b; text-transform: uppercase;">Cargo Logs</h3>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="row-input" value="1" style="width: 50px; padding: 5px; border: 1px solid #e2e8f0; border-radius: 4px; text-align: center; font-size: 11px; font-weight: 800;">
                <button onclick="addRows()" class="btn btn-primary" style="font-size: 10px; padding: 5px 15px;">ADD DATA</button>
            </div>
        </div>

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
                <!-- Dynamic Rows -->
            </tbody>
        </table>
    </div>
</main>

<script>
    let rowIndex = 0;
    const targetWT = 24.475;

    function addRows() {
        const count = parseInt(document.getElementById('row-input').value) || 1;
        const tbody = document.getElementById('simple-body');
        for (let i = 0; i < count; i++) {
            rowIndex++;
            const row = document.createElement('tr');
            row.innerHTML = `
                <td style="font-size: 10px; font-weight: 800; color: #94a3b8;">${rowIndex}</td>
                <td><input type="text" class="input-simple" placeholder="TRUCK#" style="text-transform: uppercase;"></td>
                <td><input type="date" class="input-simple"></td>
                <td><input type="number" class="input-simple" placeholder="0"></td>
                <td><input type="number" step="0.001" oninput="calc(this)" class="input-simple g-val" placeholder="G"></td>
                <td><input type="number" step="0.001" oninput="calc(this)" class="input-simple t-val" placeholder="T"></td>
                <td style="font-weight: 950; font-size: 10px; color: var(--primary);" class="n-val">0.000</td>
                <td><input type="number" class="input-simple" placeholder="SB" style="color: #ef4444; font-weight: 800;"></td>
                <td><input type="number" step="0.001" class="input-simple" placeholder="SQ" style="color: #ef4444; font-weight: 800;"></td>
                <td>
                    <div style="display: flex; align-items: center; gap: 5px;">
                        <input type="text" class="input-simple" placeholder="LR#" style="text-transform: uppercase;">
                        <label title="Upload" style="cursor: pointer; color: var(--primary);"><i class="fa-solid fa-cloud-arrow-up"></i><input type="file" hidden></label>
                    </div>
                </td>
                <td><input type="text" class="input-simple" placeholder="INV#" style="text-transform: uppercase;"></td>
                <td><input type="text" class="input-simple" placeholder="SUPPLIER NAME..." style="text-transform: uppercase;"></td>
                <td align="center"><span class="pill-modern" style="padding: 2px 6px; border-radius: 2px;">PENDING</span></td>
                <td><input type="text" class="input-simple" placeholder="Add remarks..." style="font-weight: 400; font-style: italic;"></td>
                <td align="right" style="padding-right: 20px;">
                    <button onclick="this.closest('tr').remove(); updateAll();" style="border:none; background:transparent; color: #cbd5e1; cursor:pointer;"><i class="fa-solid fa-trash-can"></i></button>
                </td>
            `;
            tbody.appendChild(row);
        }
        updateAll();
    }

    function calc(input) {
        const row = input.closest('tr');
        const g = parseFloat(row.querySelector('.g-val').value) || 0;
        const t = parseFloat(row.querySelector('.t-val').value) || 0;
        row.querySelector('.n-val').innerText = (g - t).toFixed(3) + " MT";
        updateAll();
    }

    function updateAll() {
        const rows = document.querySelectorAll('#simple-body tr');
        let move = 0;
        rows.forEach(r => {
            const g = parseFloat(r.querySelector('.g-val').value) || 0;
            const t = parseFloat(r.querySelector('.t-val').value) || 0;
            move += (g - t);
        });

        document.getElementById('s-units').innerText = rows.length + " Units";
        document.getElementById('s-moved').innerText = move.toFixed(3) + " MT";
        document.getElementById('s-balance').innerText = (targetWT - move).toFixed(3) + " MT";
    }

    function submitSave() {
        Swal.fire({
            title: 'Carting Secured',
            text: 'Cargo movement logs updated. Moving to Compliance Checklist.',
            icon: 'success',
            confirmButtonColor: '#2563eb',
            confirmButtonText: 'Next: Checklist'
        }).then(() => {
            window.location.href = 'custom-checklist.php';
        });
    }

    window.onload = () => {
        addRows();
    };
</script>

<?php include 'includes/footer.php'; ?>