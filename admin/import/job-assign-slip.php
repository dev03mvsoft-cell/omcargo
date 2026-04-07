<?php
$path_prefix = "../";
$is_root = false;
include $path_prefix . 'includes/header.php';
?>
<?php include $path_prefix . 'includes/sidebar.php'; ?>

<main class="main-area">
    <header class="header" style="background: #fff; border-bottom: 1.5px solid #f1f5f9; padding: 20px 40px; position: sticky; top: 0; z-index: 1000; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <h1 class="page-title" style="font-size: 18px; font-weight: 900; margin: 0; letter-spacing: -0.8px;">Import Job Assignment Slip</h1>
            <p style="font-size: 11px; color: var(--text-muted); font-weight: 600; margin-top: 2px;">Operational Brief & Container De-stuffing Card</p>
        </div>
        <div style="display: flex; gap: 12px;">
            <button onclick="window.print()" class="btn" style="background: #f1f5f9; color: var(--text-main); font-size: 11px; border: 1px solid #e2e8f0; font-weight: 100;">
                <i class="fa-solid fa-print" style="margin-right: 8px;"></i> PRINT BRIEF
            </button>
            <button onclick="window.history.back()" class="btn" style="background: #fff; color: var(--text-muted); font-size: 11px; border: 1px solid #e2e8f0; font-weight: 100;">EDIT JOB</button>
        </div>
    </header>

    <div class="content-padding">
        <div class="assignment-slip" id="slip-container" style="background: #fff; padding: 40px; border: 1px solid #e2e8f0; border-radius: 8px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);">
            <!-- Header Section -->
            <div class="slip-header" style="display: flex; justify-content: space-between; align-items: flex-start; border-bottom: 2px solid #000; padding-bottom: 20px; margin-bottom: 30px;">
                <div>
                    <h2 style="font-size: 24px; font-weight: 950; color: #000; margin: 0; text-transform: uppercase; letter-spacing: -1px;">Import De-stuffing Order</h2>
                    <p style="font-size: 12px; font-weight: 700; color: #64748b; margin-top: 4px;" id="disp-job-ref">REF: FETCHING...</p>
                </div>
                <div style="text-align: right;">
                    <div style="font-size: 10px; font-weight: 800; color: var(--primary); letter-spacing: 1px;">STRATEGIC LOGISTICS</div>
                    <div style="font-size: 14px; font-weight: 900; border: 2px solid var(--primary); padding: 4px 15px; display: inline-block; margin-top: 8px; background: var(--primary); color: #fff;">DRAFT ASSIGNMENT</div>
                </div>
            </div>

            <!-- Booking & Vessel Details -->
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 30px;">
                <div class="meta-box" style="padding: 15px; background: #f8fafc; border: 1px solid #e2e8f0;">
                    <span style="font-size: 9px; font-weight: 900; color: #94a3b8; text-transform: uppercase; display: block; margin-bottom: 8px;">Vessel Schedule</span>
                    <p style="font-size: 12px; font-weight: 800; margin: 0; color: #0f172a;" id="disp-vessel">VESSEL: TBD</p>
                    <p style="font-size: 11px; font-weight: 600; margin-top: 4px; color: #64748b;" id="disp-voyage">VOYAGE: TBD</p>
                </div>
                <div class="meta-box" style="padding: 15px; background: #f8fafc; border: 1px solid #e2e8f0;">
                    <span style="font-size: 9px; font-weight: 900; color: #94a3b8; text-transform: uppercase; display: block; margin-bottom: 8px;">Port Metadata</span>
                    <p style="font-size: 12px; font-weight: 800; margin: 0; color: #0f172a;" id="disp-pol">POL: TBD</p>
                    <p style="font-size: 11px; font-weight: 600; margin-top: 4px; color: #64748b;" id="disp-pod">POD: TBD</p>
                </div>
                <div class="meta-box" style="padding: 15px; background: #f8fafc; border: 1px solid #e2e8f0;">
                    <span style="font-size: 9px; font-weight: 900; color: #94a3b8; text-transform: uppercase; display: block; margin-bottom: 8px;">Terminal Hub</span>
                    <p style="font-size: 12px; font-weight: 800; margin: 0; color: var(--primary);" id="disp-hub">HUB: TBD</p>
                    <p style="font-size: 11px; font-weight: 600; margin-top: 4px; color: #64748b;" id="disp-qty">CNTR QTY: 0</p>
                </div>
            </div>

            <!-- Logistics Ledger: THE HEART OF THE ASSIGNMENT -->
            <div style="margin-bottom: 40px;">
                <h4 style="font-size: 11px; font-weight: 900; text-transform: uppercase; margin-bottom: 12px; color: #1e293b;">Logistics Ledger (Import Manifest Sync)</h4>
                <div style="overflow-x: auto; border: 1px solid #000;">
                    <table style="width: 100%; border-collapse: collapse; font-size: 10px;">
                        <thead>
                            <tr style="background: #f1f5f9; border-bottom: 2px solid #000;">
                                <th style="padding: 10px; border-right: 1px solid #cbd5e1; width: 40px;">#</th>
                                <th style="padding: 10px; border-right: 1px solid #cbd5e1; text-align: left;">GOODS DESCRIPTION</th>
                                <th style="padding: 10px; border-right: 1px solid #cbd5e1; width: 120px;">CONTAINER NO</th>
                                <th style="padding: 10px; border-right: 1px solid #cbd5e1; width: 100px;">SEAL ID</th>
                                <th style="padding: 10px; border-right: 1px solid #cbd5e1; width: 80px;">PKGS</th>
                                <th style="padding: 10px; border-right: 1px solid #cbd5e1; width: 100px;">ACTUAL WT (KG)</th>
                                <th style="padding: 10px; text-align: left;">INTEGRITY AUDIT</th>
                            </tr>
                        </thead>
                        <tbody id="disp-items">
                            <!-- Items Hydrated by JS -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Deployment Section -->
            <div style="background: #f8fafc; padding: 25px; border: 1px solid #e2e8f0; border-radius: 4px;">
                <div style="display: flex; justify-content: space-between; align-items: flex-end;">
                    <div style="flex: 1;">
                        <label style="font-size: 10px; font-weight: 900; color: var(--primary); text-transform: uppercase; margin-bottom: 12px; display: block;">Strategic Field Deployment</label>
                        <div style="display: flex; gap: 15px; align-items: center;">
                            <select id="assignee-select" class="form-input" style="background: white; width: 350px; font-weight: 800; border-color: #cbd5e1; height: 45px;">
                                <option value="">SELECT AUDITOR FOR DEPLOYMENT...</option>
                                <option value="RAHUL SHARMA">RAHUL SHARMA (TERMINAL AUDITOR)</option>
                                <option value="AMIT VERMA">AMIT VERMA (OPS COORDINATOR)</option>
                                <option value="PRIYA SINGH">PRIYA SINGH (CUSTOMS LIAISON)</option>
                            </select>
                            <button id="assign-btn" onclick="assignJob()" class="btn" style="background: var(--primary); color: #fff; padding: 0 45px; font-size: 11px; font-weight: 850; height: 45px; border-radius: 10px; border: none; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">DEPLOY AGENT</button>
                        </div>
                    </div>
                    <div style="text-align: right;">
                        <p style="font-size: 10px; font-weight: 700; color: #94a3b8; margin-bottom: 4px;">GENERATED BY OMAN CARGO CONTROL</p>
                        <p style="font-size: 13px; font-weight: 900; margin: 0; color: #000;"><?php echo date('d-M-Y | H:i'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const rawData = localStorage.getItem('currentImportJob');
    if (!rawData) {
        Swal.fire('Error', 'No Import Job Data Found in Terminal Session.', 'error').then(() => {
            window.location.href = 'job-create.php';
        });
        return;
    }

    const job = JSON.parse(rawData);
    
    // Header Data
    document.getElementById('disp-job-ref').innerText = `REF: ${job.jobId} | STATUS: DRAFT RELEASE`;
    document.getElementById('disp-vessel').innerText = `VESSEL: ${job.vesselName}`;
    document.getElementById('disp-voyage').innerText = `VOYAGE: ${job.voyageNo}`;
    document.getElementById('disp-pol').innerText = `POL: ${job.pol}`;
    document.getElementById('disp-pod').innerText = `POD: ${job.pod}`;
    document.getElementById('disp-hub').innerText = `HUB: ${job.hub}`;
    document.getElementById('disp-qty').innerText = `TOTAL CONTAINERS: ${job.items.length}`;

    // Manifest Data
    const tbody = document.getElementById('disp-items');
    if (job.items && job.items.length > 0) {
        job.items.forEach((item, idx) => {
            const row = `
                <tr style="border-bottom: 1px solid #cbd5e1;">
                    <td align="center" style="padding: 10px; border-right: 1px solid #cbd5e1; font-weight: 800;">${item.srNo}</td>
                    <td style="padding: 10px; border-right: 1px solid #cbd5e1; font-weight: 600;">CORIANDER SEEDS CROP 2024</td>
                    <td align="center" style="padding: 10px; border-right: 1px solid #cbd5e1; font-weight: 800; color: #2563eb;">${item.container}</td>
                    <td style="padding: 10px; border-right: 1px solid #cbd5e1; font-size: 10px; font-weight: 800;">${item.seal}</td>
                    <td align="center" style="padding: 10px; border-right: 1px solid #cbd5e1;">${item.pkgs} ${item.type}</td>
                    <td align="center" style="padding: 10px; border-right: 1px solid #cbd5e1; font-weight: 700; color: #ef4444;">${item.weight} KG</td>
                    <td style="padding: 10px; font-size: 10px; font-weight: 900; color: #16a34a;">
                        ${item.integrity}
                    </td>
                </tr>`;
            tbody.insertAdjacentHTML('beforeend', row);
        });
    } else {
        tbody.innerHTML = '<tr><td colspan="7" align="center" style="padding: 20px;">NO CONTAINERS DEFINED IN MANIFEST</td></tr>';
    }
});

function assignJob() {
    const agent = document.getElementById('assignee-select').value;
    if (!agent) {
        Swal.fire('Warning', 'Please select an agent for terminal deployment.', 'warning');
        return;
    }

    const rawData = localStorage.getItem('currentImportJob');
    if (rawData) {
        const job = JSON.parse(rawData);
        const assignment = {
            id: job.jobId,
            date: new Date().toLocaleDateString('en-GB'),
            client: job.client,
            ref: 'B/L RECONCILED',
            type: 'IMPORT',
            assignee: agent,
            initials: agent.split(' ').map(n => n[0]).join(''),
            status: 'DEPLOYED'
        };

        // Push to master board
        let board = JSON.parse(localStorage.getItem('omanCargoAssignments') || '[]');
        board.unshift(assignment);
        localStorage.setItem('omanCargoAssignments', JSON.stringify(board));
    }

    Swal.fire({
        title: 'Deployment Successful!',
        text: `Import Job has been assigned to ${agent}. Moving to Active Work Board.`,
        icon: 'success',
        confirmButtonColor: '#000',
        confirmButtonText: 'View Assignments'
    }).then(() => {
        window.location.href = '../work-assignment.php';
    });
}
</script>

<?php include $path_prefix . 'includes/footer.php'; ?>
