<?php
$path_prefix = "";
$is_root = false;
include 'includes/header.php';
?>
<?php include 'includes/sidebar.php'; ?>

<style>
    .gatein-hub { padding: 40px; background: #fff; }
    


    /* Modern Simple Table */
    .simple-table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
    .simple-table th { padding: 10px 12px; background: #f8fafc; font-size: 9px; font-weight: 800; color: #475569; text-transform: uppercase; text-align: left; border-bottom: 1px solid #e2e8f0; white-space: nowrap; }
    .simple-table td { padding: 12px 15px; border-bottom: 1px solid #f1f5f9; vertical-align: middle; }
    .simple-table tr:hover { background: #fcfdfe; }
    
    .input-simple { width: 100%; border: 1px solid #e2e8f0; border-radius: 4px; padding: 8px 10px; font-size: 11px; font-weight: 600; color: #1e293b; background: #fff; }
    .input-simple:focus { border-color: var(--primary); outline: none; }
    
    .section-title { font-size: 11px; font-weight: 900; color: #1e293b; text-transform: uppercase; margin-bottom: 20px; display: flex; align-items: center; gap: 8px; }
    .status-pill { padding: 4px 10px; border-radius: 4px; font-size: 9px; font-weight: 800; text-transform: uppercase; }
    .status-pending { background: #fff7ed; color: #c2410c; }
    .status-done { background: #ecfdf5; color: #059669; }
</style>

<main class="main-area">
    <header class="header" style="border-bottom: 1px solid #f1f5f9; background: #fff; padding: 20px 40px;">
        <div>
            <h1 class="page-title" style="font-size: 18px; font-weight: 900;">Terminal Gate-In Status</h1>
            <p style="font-size: 10px; color: #64748b; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;">STAGE 05: PORT ARRIVAL VERIFICATION</p>
        </div>
        <div style="display: flex; gap: 15px;">
            <button onclick="window.history.back()" class="btn" style="background:#fff; border: 1px solid #e2e8f0; color: #64748b; font-size: 11px; font-weight: 800;">BACK</button>
            <button onclick="submitGateIn()" class="btn btn-primary" style="padding: 10px 25px; font-size: 11px; font-weight: 800;">SAVE & FINALIZE</button>
        </div>
    </header>

    <div class="gatein-hub">
        <!-- 1. Minimalist Stepper -->
        <div class="minimal-stepper">
            <div class="m-step completed">01. CARTING</div>
            <div class="m-step completed">02. CHECKLIST</div>
            <div class="m-step completed">03. BOOKING</div>
            <div class="m-step completed">04. LINING</div>
            <div class="m-step active">05. GATE IN</div>
            <div class="m-step">06. ONBOARD</div>
        </div>

        <!-- 2. Terminal Arrival Audit -->
        <div class="section-title">
            <i class="fa-solid fa-truck-ramp-box"></i> Terminal Arrival & Unit Verification
        </div>

        <div style="overflow-x: auto; border: 1px solid #e2e8f0; border-radius: 8px; background: #fff;">
            <table class="simple-table" style="min-width: 1400px; margin-bottom: 0;">
                <thead>
                    <tr>
                        <th width="40">#</th>
                        <th width="150">Container No</th>
                        <th width="120">Seal No</th>
                        <th width="120">Truck No</th>
                        <th width="100">Bags/Qty</th>
                        <th width="100">Gross Wt</th>
                        <th width="100">Net Wt</th>
                        <th width="100">Tare Wt</th>
                        <th width="150">Gate-In Arrival</th>
                        <th width="180">Arrival Status (YES/NO)</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody id="gatein-registry">
                    <!-- Standard 5 Container Job Logic -->
                    <?php for($i=1; $i<=5; $i++): ?>
                    <tr>
                        <td style="font-size: 10px; font-weight: 800; color: #94a3b8;"><?php echo $i; ?></td>
                        <td><input type="text" class="input-simple" value="HLCU<?php echo 1000 + $i; ?>" style="font-weight: 800; text-transform: uppercase;"></td>
                        <td><input type="text" class="input-simple" value="SL-<?php echo 5000 + $i; ?>"></td>
                        <td><input type="text" class="input-simple" value="OMAN-TRK-77<?php echo $i; ?>"></td>
                        <td><input type="number" class="input-simple" value="100"></td>
                        <td><input type="number" class="input-simple" value="25000.00"></td>
                        <td><input type="number" class="input-simple" value="23000.00"></td>
                        <td><input type="number" class="input-simple" value="2000.00"></td>
                        <td><input type="datetime-local" class="input-simple" value="<?php echo date('Y-m-d\TH:i'); ?>"></td>
                        <td>
                            <select class="input-simple arrival-status" style="font-weight: 800; color: #2563eb;" onchange="updateTerminalTally()">
                                <option value="no">NOT ARRIVED (NO)</option>
                                <option value="yes">GATE-IN DONE (YES)</option>
                            </select>
                        </td>
                        <td><input type="text" class="input-simple" placeholder="..."></td>
                    </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>

        <!-- 3. Terminal Summary -->
        <div style="margin-top: 40px; display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
            <div style="background: #f8fafc; padding: 25px; border-radius: 8px; border: 1px solid #e2e8f0; text-align: center;">
                <div style="font-size: 9px; font-weight: 800; color: #94a3b8; text-transform: uppercase;">Expected Units</div>
                <div style="font-size: 24px; font-weight: 900; color: #1e293b; margin-top: 5px;" id="disp-total">0 / 0</div>
            </div>
            <div style="background: #ecfdf5; padding: 25px; border-radius: 8px; border: 1px solid #d1fae5; text-align: center;">
                <div style="font-size: 9px; font-weight: 800; color: #065f46; text-transform: uppercase;">Gate-In Completed</div>
                <div style="font-size: 24px; font-weight: 900; color: #059669; margin-top: 5px;" id="disp-arrived">0 UNITS</div>
            </div>
            <div style="background: #fff7ed; padding: 25px; border-radius: 8px; border: 1px solid #ffedd5; text-align: center;">
                <div style="font-size: 9px; font-weight: 800; color: #9a3412; text-transform: uppercase;">Pending Arrival</div>
                <div style="font-size: 24px; font-weight: 900; color: #c2410c; margin-top: 5px;" id="disp-pending">0 UNITS</div>
            </div>
        </div>
    </div>
</main>

<script>
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

    window.onload = updateTerminalTally;

    function submitGateIn() {
        Swal.fire({
            title: 'Gate-In Verified',
            text: 'Terminal arrival sequence synchronized. Moving to Stage 06: Onboard.',
            icon: 'success',
            confirmButtonColor: '#2563eb'
        }).then(() => {
            window.location.href = 'onboard.php';
        });
    }
</script>

<?php include 'includes/footer.php'; ?>
