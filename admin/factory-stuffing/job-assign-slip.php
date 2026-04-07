<?php
$path_prefix = "../";
$is_root = false;
include $path_prefix . 'includes/header.php';
?>
<?php include $path_prefix . 'includes/sidebar.php'; ?>

<main class="main-area">
    <header class="header">
        <div>
            <h1 class="page-title">Factory Job Assignment Slip</h1>
            <p style="font-size: 11px; color: var(--text-muted); font-weight: 600;">Operational Brief & Container Logistics Card</p>
        </div>
        <div style="display: flex; gap: 12px;">
            <button onclick="window.print()" class="btn" style="background: #f1f5f9; color: var(--text-main); font-size: 11px; border: 1px solid var(--border);">
                <i class="fa-solid fa-print" style="margin-right: 8px;"></i> PRINT BRIEF
            </button>
            <button onclick="window.history.back()" class="btn" style="background: #fff; color: var(--text-muted); font-size: 11px; border: 1px solid var(--border);">EDIT JOB</button>
        </div>
    </header>

    <div class="content-padding">
        <div class="assignment-slip" id="slip-container">
            <!-- Header Section -->
            <div class="slip-header" style="display: flex; justify-content: space-between; align-items: flex-start; border-bottom: 2px solid #000; padding-bottom: 20px; margin-bottom: 30px;">
                <div>
                    <h2 style="font-size: 24px; font-weight: 950; color: #000; margin: 0; text-transform: uppercase; letter-spacing: -1px;">Factory Loading Order</h2>
                    <p style="font-size: 12px; font-weight: 700; color: #64748b; margin-top: 4px;" id="disp-job-ref">REF: FETCHING...</p>
                </div>
                <div style="text-align: right;">
                    <div style="font-size: 10px; font-weight: 800; color: var(--primary); letter-spacing: 1px;">STRATEGIC LOGISTICS</div>
                    <div style="font-size: 14px; font-weight: 900; border: 2px solid #000; padding: 4px 15px; display: inline-block; margin-top: 8px; background: var(--primary);  color: #fff;">DRAFT ASSIGNMENT</div>
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
                    <span style="font-size: 9px; font-weight: 900; color: #94a3b8; text-transform: uppercase; display: block; margin-bottom: 8px;">Booking Metadata</span>
                    <p style="font-size: 12px; font-weight: 800; margin: 0; color: #0f172a;" id="disp-booking">NO: TBD</p>
                    <p style="font-size: 11px; font-weight: 600; margin-top: 4px; color: #64748b;" id="disp-line">LINE: TBD</p>
                </div>
                <div class="meta-box" style="padding: 15px; background: #f8fafc; border: 1px solid #e2e8f0;">
                    <span style="font-size: 9px; font-weight: 900; color: #94a3b8; text-transform: uppercase; display: block; margin-bottom: 8px;">Factory Protocol</span>
                    <p style="font-size: 12px; font-weight: 800; margin: 0; color: var(--primary);" id="disp-factory">FAC: TBD</p>
                    <p style="font-size: 11px; font-weight: 600; margin-top: 4px; color: #64748b;" id="disp-qty">CNTR QTY: 0</p>
                </div>
            </div>

            <!-- Logistics Ledger: THE HEART OF THE ASSIGNMENT -->
            <div style="margin-bottom: 40px;">
                <h4 style="font-size: 11px; font-weight: 900; text-transform: uppercase; margin-bottom: 12px; color: #1e293b;">Logistics Ledger (Strategic Manifest)</h4>
                <div style="overflow-x: auto; border: 1px solid #000;">
                    <table style="width: 100%; border-collapse: collapse; font-size: 10px;">
                        <thead>
                            <tr style="background: #f1f5f9; border-bottom: 2px solid #000;">
                                <th style="padding: 10px; border-right: 1px solid #cbd5e1; width: 40px;">#</th>
                                <th style="padding: 10px; border-right: 1px solid #cbd5e1; text-align: left;">GOODS DESCRIPTION</th>
                                <th style="padding: 10px; border-right: 1px solid #cbd5e1; width: 120px;">CONTAINER NO</th>
                                <th style="padding: 10px; border-right: 1px solid #cbd5e1; width: 100px;">SEAL / TRUCK</th>
                                <th style="padding: 10px; border-right: 1px solid #cbd5e1; width: 80px;">NET (KG)</th>
                                <th style="padding: 10px; border-right: 1px solid #cbd5e1; width: 80px;">GROSS (KG)</th>
                                <th style="padding: 10px; text-align: left;">LORRY DETAILS (NAME/NO)</th>
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
                                <option value="">SELECT AGENT FOR DEPLOYMENT...</option>
                                <option value="RAHUL SHARMA">RAHUL SHARMA (SENIOR OPERATIONS)</option>
                                <option value="AMIT VERMA">AMIT VERMA (DOCUMENTATION HUB)</option>
                                <option value="PRIYA SINGH">PRIYA SINGH (FACTORY LIAISON)</option>
                            </select>
                            <button id="assign-btn" onclick="assignJob()" class="btn" style="background: var(--primary);  color: #fff; padding: 0 45px; font-size: 11px; font-weight: 850; height: 45px; border-radius: 10px; border: none; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">DEPLOY AGENT</button>
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
        const rawData = localStorage.getItem('currentFactoryJob');
        if (!rawData) {
            Swal.fire('Error', 'No Job Data Found in Terminal Session.', 'error').then(() => {
                window.location.href = 'job-create.php';
            });
            return;
        }

        const job = JSON.parse(rawData);

        // Header Data
        document.getElementById('disp-job-ref').innerText = `REF: ${job.jobId} | STATUS: DRAFT`;
        document.getElementById('disp-vessel').innerText = `VESSEL: ${job.vesselName}`;
        document.getElementById('disp-voyage').innerText = `VOYAGE: ${job.voyageNo}`;
        document.getElementById('disp-booking').innerText = `BOOKING: ${job.bookingNo}`;
        document.getElementById('disp-line').innerText = `LINE: ${job.shippingLine}`;
        document.getElementById('disp-factory').innerText = `FAC: ${job.factoryName}`;
        document.getElementById('disp-qty').innerText = `TOTAL CONTAINERS: ${job.totalContainers}`;

        // Manifest Data
        const tbody = document.getElementById('disp-items');
        if (job.items && job.items.length > 0) {
            job.items.forEach((item, idx) => {
                const row = `
                <tr style="border-bottom: 1px solid #cbd5e1;">
                    <td align="center" style="padding: 10px; border-right: 1px solid #cbd5e1; font-weight: 800;">${item.srNo || (idx+1).toString().padStart(2, '0')}</td>
                    <td style="padding: 10px; border-right: 1px solid #cbd5e1; font-weight: 600;">${item.desc || 'N/A'}</td>
                    <td align="center" style="padding: 10px; border-right: 1px solid #cbd5e1; font-weight: 800; color: #2563eb;">${item.container}</td>
                    <td style="padding: 10px; border-right: 1px solid #cbd5e1; font-size: 9px;">
                        <strong>S:</strong> ${item.seal}<br><strong>T:</strong> ${item.truck}
                    </td>
                    <td align="center" style="padding: 10px; border-right: 1px solid #cbd5e1;">${parseFloat(item.net).toLocaleString()} KG</td>
                    <td align="center" style="padding: 10px; border-right: 1px solid #cbd5e1; font-weight: 700;">${parseFloat(item.gross).toLocaleString()} KG</td>
                    <td style="padding: 10px; font-size: 9px;">
                        <strong>ADM:</strong> ${item.lrName || 'TBD'}<br><strong>NO:</strong> ${item.lrNo || 'TBD'}
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
            Swal.fire('Warning', 'Please select an agent for field deployment.', 'warning');
            return;
        }

        Swal.fire({
            title: 'Deployment Successful!',
            text: `Job REF: OCM-FAC-24 has been assigned to ${agent}. Moving to Stage 02: Verification Checklist.`,
            icon: 'success',
            confirmButtonColor: '#2563eb',
            confirmButtonText: 'Next: Documentation'
        }).then(() => {
            window.location.href = 'checklist.php';
        });
    }
</script>

<?php include $path_prefix . 'includes/footer.php'; ?>