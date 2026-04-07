<?php
$path_prefix = "../";
$is_root = false;
include $path_prefix . 'includes/header.php';
?>
<?php include $path_prefix . 'includes/sidebar.php'; ?>

<style>
    .gatein-hub {
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
        margin-bottom: 30px;
    }

    .simple-table th {
        padding: 10px 12px;
        background: #f8fafc;
        font-size: 9px;
        font-weight: 800;
        color: #475569;
        text-transform: uppercase;
        text-align: left;
        border-bottom: 1px solid #e2e8f0;
        white-space: nowrap;
    }

    .simple-table td {
        padding: 12px 15px;
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

    .section-title {
        font-size: 11px;
        font-weight: 900;
        color: #1e293b;
        text-transform: uppercase;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
</style>

<main class="main-area">
    <header class="header" style="border-bottom: 1px solid #f1f5f9; background: #fff; padding: 20px 40px;">
        <div>
            <h1 class="page-title" style="font-size: 18px; font-weight: 900;">Terminal Gate-In Verification</h1>
            <p style="font-size: 10px; color: #64748b; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;">STAGE 04: PORT ARRIVAL & TALLY SYNC</p>
        </div>
        <div style="display: flex; gap: 15px;">
            <button onclick="window.history.back()" class="btn" style="background:#fff; border: 1px solid #e2e8f0; color: #64748b; font-size: 11px; font-weight: 800;">BACK</button>
            <button onclick="submitGateIn()" class="btn btn-primary" style="padding: 10px 25px; font-size: 11px; font-weight: 800; background: var(--primary);">Save</button>
        </div>
    </header>

    <div class="gatein-hub">
        <!-- 1. Minimal Stepper -->
        <div class="minimal-stepper">
            <div class="m-step completed">01. JOB CREATE</div>
            <div class="m-step completed">02. CHECKLIST</div>
            <div class="m-step completed">03. BOOKING</div>
            <div class="m-step active">04. GATE IN</div>
            <div class="m-step">05. ONBOARD</div>
        </div>

        <!-- 2. Terminal Arrival Audit -->
        <div class="section-title">
            <i class="fa-solid fa-truck-ramp-box"></i> Terminal Arrival & Unit Verification (Factory Units)
        </div>

        <div style="overflow-x: auto; border: 1px solid #e2e8f0; border-radius: 8px; background: #fff;">
            <table class="simple-table" style="min-width: 1400px; margin-bottom: 0;">
                <thead>
                    <tr>
                        <th width="40">#</th>
                        <th width="150">Container No</th>
                        <th width="120">Seal No</th>
                        <th width="120">Truck No</th>
                        <th width="100">Booking Ref</th>
                        <th width="100">Gross Wt</th>
                        <th width="100">Net Wt</th>
                        <th width="100">Tare Wt</th>
                        <th width="150">Gate-In Arrival</th>
                        <th width="180">Arrival Status (YES/NO)</th>
                        <th>Remarks / Inspection</th>
                    </tr>
                </thead>
                <tbody id="gatein-registry">
                    <!-- Items Hydrated by JS -->
                </tbody>
            </table>
        </div>

        <!-- 3. Terminal Summary -->
        <div style="margin-top: 40px; display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
            <div style="background: #f8fafc; padding: 25px; border-radius: 8px; border: 1px solid #e2e8f0; text-align: center;">
                <div style="font-size: 9px; font-weight: 800; color: #94a3b8; text-transform: uppercase;">Total Units Expected</div>
                <div style="font-size: 24px; font-weight: 900; color: #1e293b; margin-top: 5px;" id="disp-total">0 / 0</div>
            </div>
            <div style="background: #ecfdf5; padding: 25px; border-radius: 8px; border: 1px solid #d1fae5; text-align: center;">
                <div style="font-size: 9px; font-weight: 800; color: #065f46; text-transform: uppercase;">Port Entry Confirmed</div>
                <div style="font-size: 24px; font-weight: 900; color: #059669; margin-top: 5px;" id="disp-arrived">0 UNITS</div>
            </div>
            <div style="background: #fff7ed; padding: 25px; border-radius: 8px; border: 1px solid #ffedd5; text-align: center;">
                <div style="font-size: 9px; font-weight: 800; color: #9a3412; text-transform: uppercase;">Awaiting Arrival</div>
                <div style="font-size: 24px; font-weight: 900; color: #c2410c; margin-top: 5px;" id="disp-pending">0 UNITS</div>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const rawData = localStorage.getItem('currentFactoryJob');
        if (!rawData) {
            Swal.fire('Session Expired', 'Job metadata not found.', 'warning').then(() => {
                window.location.href = 'job-create.php';
            });
            return;
        }

        const job = JSON.parse(rawData);
        const tbody = document.getElementById('gatein-registry');

        if (job.items && job.items.length > 0) {
            job.items.forEach((item, idx) => {
                const row = `
                <tr>
                    <td style="font-size: 10px; font-weight: 800; color: #94a3b8;">${(idx+1).toString().padStart(2, '0')}</td>
                    <td><input type="text" class="input-simple" value="${item.container}" style="font-weight: 800; text-transform: uppercase;"></td>
                    <td><input type="text" class="input-simple" value="${item.seal}"></td>
                    <td><input type="text" class="input-simple" value="${item.truck}"></td>
                    <td><input type="text" class="input-simple" value="${job.bookingNo || 'PENDING'}"></td>
                    <td><input type="number" class="input-simple" value="${item.gross}"></td>
                    <td><input type="number" class="input-simple" value="${item.net}"></td>
                    <td><input type="number" class="input-simple" value="${(item.gross - item.net).toFixed(2)}"></td>
                    <td><input type="datetime-local" class="input-simple" value="<?php echo date('Y-m-d\TH:i'); ?>"></td>
                    <td>
                        <select class="input-simple arrival-status" style="font-weight: 800; color: #2563eb;" onchange="updateTerminalTally()">
                            <option value="no">NOT ARRIVED (NO)</option>
                            <option value="yes">GATE-IN DONE (YES)</option>
                        </select>
                    </td>
                    <td><input type="text" class="input-simple" placeholder="..."></td>
                </tr>`;
                tbody.insertAdjacentHTML('beforeend', row);
            });
            updateTerminalTally();
        } else {
            tbody.innerHTML = '<tr><td colspan="11" align="center" style="padding: 30px; color: #94a3b8;">NO CONTAINER RECORDS DETECTED</td></tr>';
        }
    });

    function updateTerminalTally() {
        const rows = document.querySelectorAll('#gatein-registry tr');
        const statuses = document.querySelectorAll('.arrival-status');

        let total = rows.length;
        let arrived = 0;
        let pending = 0;

        statuses.forEach(s => {
            if (s.value === 'yes') arrived++;
            else pending++;
        });

        document.getElementById('disp-total').innerText = arrived + ' / ' + total;
        document.getElementById('disp-arrived').innerText = arrived + ' UNITS';
        document.getElementById('disp-pending').innerText = pending + ' UNITS';
    }

    function submitGateIn() {
        Swal.fire({
            title: 'Gate-In Verified',
            text: 'Terminal arrival sequence synchronized via Factory Protocol. Moving to Stage 05: On-board.',
            icon: 'success',
            confirmButtonColor: '#000',
            confirmButtonText: 'Next: On-board'
        }).then(() => {
            window.location.href = 'onboard.php';
        });
    }
</script>

<?php include $path_prefix . 'includes/footer.php'; ?>