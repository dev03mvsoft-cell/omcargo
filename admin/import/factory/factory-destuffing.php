<?php
$path_prefix = "../../";
$is_root = false;
include $path_prefix . 'includes/header.php';
?>
<?php include $path_prefix . 'includes/sidebar.php'; ?>

<style>
/* PREMIUM TOASTER CSS */
.toast-container {
    position: fixed;
    bottom: 30px;
    right: 30px;
    z-index: 9999;
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.toast {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border: 1px solid #bbf7d0;
    border-left: 5px solid #10b981;
    border-radius: 12px;
    padding: 16px 24px;
    min-width: 320px;
    display: flex;
    align-items: center;
    gap: 15px;
    box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.1);
    transform: translateX(120%);
    transition: all 0.5s cubic-bezier(0.19, 1, 0.22, 1);
}

.toast.show {
    transform: translateX(0);
}

.toast-icon {
    width: 40px;
    height: 40px;
    background: #f0fdf4;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #10b981;
    font-size: 18px;
}

.toast-text {
    flex: 1;
}

.toast-title {
    font-size: 14px;
    font-weight: 700;
    color: #01172a;
    display: block;
    margin-bottom: 2px;
}

.toast-msg {
    font-size: 13px;
    color: #64748b;
    font-weight: 500;
}
</style>

<div class="toast-container" id="toast-container"></div>

<main class="main-area">
    <header class="header" style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 20px 40px; position: sticky; top: 0; z-index: 1000; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <span style="font-size: 13px; font-weight: 600; color: var(--primary); text-transform: uppercase; letter-spacing: 1px; display: block; margin-bottom: 4px;">FACTORY FLOW: FINAL STAGE (DE-STUFFING)</span>
            <h1 class="page-title" style="font-size: 20px; font-weight: 600; margin: 0; color: #01172a;">Unloading & Inventory Verification</h1>
            <p style="font-size: 14px; color: var(--text-muted); font-weight: 600; margin-top: 2px;">OCM-FAC-24-902 | CONTAINER: MAEU4430910</p>
        </div>
        <div style="display: flex; gap: 15px;">
            <button onclick="window.history.back()" class="btn" style="background:#fff; border: 1px solid #e2e8f0; color: #64748b; font-size: 11px; font-weight: 800;">BACK</button>
            <button type="submit" form="fac-destuff-form" class="btn btn-primary" style="padding: 10px 25px; font-size: 14px; font-weight: 600; background: var(--primary); color: #fff; border: none; cursor: pointer;">SAVE & PROCEED</button>
        </div>
    </header>

    <!-- 1. Minimalist Stepper -->
    <div style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 25px 40px 0 40px;">
        <div class="minimal-stepper" style="justify-content: flex-start; margin-bottom: 0; border-bottom: none;">
            <div class="m-step completed">01. PORT ARRIVAL</div>
            <div class="m-step completed">02. GATE OUT</div>
            <div class="m-step completed">03. FACTORY IN</div>
            <div class="m-step active">04. DE-STUFFING</div>
        </div>
    </div>

    <div class="content-padding" style="padding: 40px;">
        <?php if (isset($_GET['success'])): ?>
            <!-- HIGH-FIDELITY SUCCESS STATE -->
            <div style="background: #fff; border: 1px solid #e2e8f0; border-radius: 20px; padding: 80px 40px; text-align: center; max-width: 800px; margin: 40px auto; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);">
                <div style="width: 100px; height: 100px; background: #f0fdf4; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 30px;">
                    <i class="fa-solid fa-circle-check" style="font-size: 50px; color: #10b981;"></i>
                </div>
                <h2 style="font-size: 32px; font-weight: 700; color: #01172a; margin: 0 0 10px 0;">Mission Accomplished</h2>
                <p style="font-size: 16px; color: #64748b; margin-bottom: 40px;">The industrial de-stuffing workflow for <strong>OCM-FAC-24-902</strong> has been successfully finalized and archived.</p>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 50px; text-align: left; background: #f8fafc; padding: 25px; border-radius: 12px; border: 1px solid #f1f5f9;">
                    <div>
                        <span style="font-size: 11px; font-weight: 600; color: #94a3b8; text-transform: uppercase; display: block; margin-bottom: 5px;">CLIENT REFERENCE</span>
                        <span style="font-size: 14px; font-weight: 600; color: #1e293b;">RAYSUT CEMENT CO.</span>
                    </div>
                    <div>
                        <span style="font-size: 11px; font-weight: 600; color: #94a3b8; text-transform: uppercase; display: block; margin-bottom: 5px;">FINAL STATUS</span>
                        <span style="font-size: 14px; font-weight: 600; color: #10b981;"><i class="fa-solid fa-flag-checkered"></i> 100% DELIVERED</span>
                    </div>
                </div>

                <div style="display: flex; gap: 15px; justify-content: center;">
                    <button onclick="window.location.href='../../work-assignment.php'" class="btn" style="padding: 15px 40px; font-size: 14px; font-weight: 600; background: var(--primary); color: #fff; border: none; border-radius: 10px; cursor: pointer;">BACK TO LOGISTICS HUB</button>
                    <button onclick="window.print()" class="btn" style="padding: 15px 40px; font-size: 14px; font-weight: 600; background: #fff; border: 1.5px solid #e2e8f0; color: #64748b; border-radius: 10px; cursor: pointer;"><i class="fa-solid fa-print"></i> PRINT TALLY REPORT</button>
                </div>
            </div>
        <?php else: ?>
        <form id="fac-destuff-form" action="factory-destuffing.php?success=1" method="POST" enctype="multipart/form-data">
            
            <div class="form-section">
                <h3 class="section-title"><i class="fa-solid fa-clock-rotate-left"></i> Unloading Operations</h3>
                <div class="sub-field-grid" style="grid-template-columns: 1fr 1fr 1fr; gap: 20px;">
                    <div class="form-group">
                        <label class="form-label">De-stuffing Start Time</label>
                        <input type="datetime-local" name="destuff_start" class="form-input" style="font-weight: 400;">
                    </div>
                    <div class="form-group">
                        <label class="form-label">De-stuffing End Time</label>
                        <input type="datetime-local" name="destuff_end" class="form-input" style="font-weight: 400;">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tally Sheet / Job ID</label>
                        <input type="text" name="tally_id" placeholder="TLY-FAC-4001" class="form-input" style="font-weight: 400;">
                    </div>
                </div>
            </div>

            <!-- Product Tally Section (As requested by user in context) -->
            <div class="form-section">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h3 class="section-title" style="margin: 0;"><i class="fa-solid fa-clipboard-list"></i> Product Tally & Condition Report</h3>
                    <button type="button" onclick="addProductRow()" class="btn" style="background: #f1f5f9; color: var(--primary); font-size: 13px; font-weight: 600; padding: 8px 15px; border-radius: 6px; border: 1px solid #e2e8f0; cursor: pointer;"><i class="fa-solid fa-plus"></i> ADD PRODUCT LINE</button>
                </div>
                
                <div class="card" style="padding: 25px; overflow-x: auto;">
                    <table class="classic-table" id="destuff-tally-table" style="min-width: 1000px; border-collapse: separate; border-spacing: 0;">
                        <thead>
                            <tr>
                                <th>Truck / Trailer</th>
                                <th>Product / SKU</th>
                                <th>Unit Type</th>
                                <th width="100" style="text-align: center;">Manifest</th>
                                <th width="100" style="text-align: center;">Rec. (OK)</th>
                                <th width="100" style="text-align: center;">Damaged</th>
                                <th width="100" style="text-align: center;">Short/Exs</th>
                                <th width="100" style="text-align: center;">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="border: 2px solid #000;"><input type="text" value="OM-TR-4550" class="data-input" style="font-weight: 500; color: #1e293b; background: transparent;"></td>
                                <td style="border: 2px solid #000;"><input type="text" value="INDUSTRIAL PUMPS CP-40" class="data-input" style="font-weight: 500; color: var(--primary); background: transparent;"></td>
                                <td style="border: 2px solid #000;">
                                    <select class="data-input" style="font-weight: 400; background: transparent;">
                                        <option>BAGS</option>
                                        <option>BOXES</option>
                                        <option>PALLETS</option>
                                        <option>UNITS</option>
                                    </select>
                                </td>
                                <td style="border: 2px solid #000;"><input type="number" value="100" class="data-input" style="text-align: center; font-weight: 400; background: transparent;"></td>
                                <td style="border: 2px solid #000;"><input type="number" value="98" class="data-input" style="text-align: center; font-weight: 500; background: transparent; color: #16a34a;"></td>
                                <td style="border: 2px solid #000;"><input type="number" value="2" class="data-input" style="text-align: center; font-weight: 500; background: transparent; color: #dc2626;"></td>
                                <td style="border: 2px solid #000;"><input type="number" value="0" class="data-input" style="text-align: center; font-weight: 400; background: transparent;"></td>
                                <td style="border: 2px solid #000;"><input type="number" value="100" class="data-input" style="text-align: center; font-weight: 600; background: transparent; color: var(--primary);"></td>
                            </tr>
                        </tbody>
                        <tfoot style="background: #f8fafc;">
                            <tr>
                                <td colspan="3" style="border: 2px solid #000; padding: 18px 16px; text-align: right; font-size: 13px; font-weight: 600; color: #475569; text-transform: uppercase;">Grand Total Tally</td>
                                <td style="border: 2px solid #000; padding: 18px 16px; text-align: center;">
                                    <div style="font-weight: 600; font-size: 14px; color: #1e293b;">100</div>
                                </td>
                                <td style="border: 2px solid #000; padding: 18px 16px; text-align: center;">
                                    <div style="font-weight: 600; font-size: 14px; color: #16a34a;">98</div>
                                </td>
                                <td style="border: 2px solid #000; padding: 18px 16px; text-align: center;">
                                    <div style="font-weight: 600; font-size: 14px; color: #dc2626;">2</div>
                                </td>
                                <td style="border: 2px solid #000; padding: 18px 16px; text-align: center;">
                                    <div style="font-weight: 600; font-size: 14px; color: #475569;">0</div>
                                </td>
                                <td style="border: 2px solid #000; padding: 18px 16px; text-align: center;">
                                    <div style="font-weight: 600; font-size: 14px; color: var(--primary);">100</div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <div class="form-section">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h3 class="section-title" style="margin: 0;"><i class="fa-solid fa-file-shield"></i> Post De-stuffing Documentation</h3>
                    <button type="button" onclick="addDestuffDocRow()" class="btn" style="background: #f1f5f9; color: var(--primary); font-size: 13px; font-weight: 600; padding: 8px 15px; border-radius: 6px; border: 1px solid #e2e8f0; cursor: pointer;"><i class="fa-solid fa-plus"></i> ADD NEW DOC</button>
                </div>
                
                <div class="card" style="padding: 25px; overflow-x: auto;">
                    <table class="classic-table" id="destuff-evidence-table">
                        <thead>
                            <tr>
                                <th>Document Name</th>
                                <th width="400">Upload Remark / Notes</th>
                                <th width="150" style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="border: 2px solid #000;">
                                    <input type="text" value="Signed Tally Sheet" class="data-input" style="font-weight: 500; color: var(--primary); background: transparent;">
                                </td>
                                <td style="border: 2px solid #000;">
                                    <input type="text" placeholder="Enter doc remarks..." class="data-input" style="font-weight: 400; background: transparent;">
                                </td>
                                <td align="center" style="border: 2px solid #000;">
                                    <button type="button" onclick="this.nextElementSibling.click()" style="background: #fdf2f8; color: #be185d; border-color: #fbcfe8; border-style: dashed; padding: 4px 10px; font-size: 10px; font-weight: 700; cursor: pointer;">
                                        <i class="fa-solid fa-cloud-arrow-up"></i> UPLOAD
                                    </button>
                                    <input type="file" hidden>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: 2px solid #000;">
                                    <input type="text" value="Delivery Note (DO) Copy" class="data-input" style="font-weight: 500; color: var(--primary); background: transparent;">
                                </td>
                                <td style="border: 2px solid #000;">
                                    <input type="text" placeholder="Enter slip reference..." class="data-input" style="font-weight: 400; background: transparent;">
                                </td>
                                <td align="center" style="border: 2px solid #000;">
                                    <button type="button" style="background: #f1f5f9; color: #64748b; border: 1px solid #e2e8f0; padding: 4px 10px; font-size: 10px; font-weight: 700; cursor: pointer;">
                                        <i class="fa-solid fa-paperclip"></i> ATTACH
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="form-group" style="margin-top: 25px;">
                    <label class="form-label" style="font-size: 14px;">Final Delivery Remarks</label>
                    <textarea name="remarks_delivery" rows="2" class="form-input" placeholder="General observations on shipment delivery..." style="height: 120px; font-weight: 400; font-size: 14px; padding: 12px 16px;"></textarea>
                </div>
            </div>

            <!-- SUCCESS NOTIFICATION BANNER -->
            <div style="background: #f0fdf4; border: 1px solid #bbf7d0; padding: 25px; border-radius: 12px; margin-top: 30px; display: flex; align-items: flex-start; gap: 20px;">
                <i class="fa-solid fa-circle-check" style="color: #10b981; font-size: 26px; margin-top: 3px;"></i>
                <div>
                    <h4 style="font-size: 15px; font-weight: 700; color: #166534; margin: 0;">Industrial Workflow Completion</h4>
                    <p style="font-size: 14px; color: #15803d; font-weight: 500; margin: 5px 0 0 0;">Submitting this report will finalize the Tally Sheet, archive the container evidence, and mark this job as 100% COMPLETE in the Master Registry.</p>
                </div>
            </div>

            <div style="display: flex; justify-content: flex-end; padding-top: 40px;">
                <button type="submit" class="btn btn-primary" style="padding: 18px 80px; font-size: 14px; font-weight: 700; background: #10b981; color: #fff; border: none; border-radius: 12px; cursor: pointer; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);">FINALIZE & CLOSE JOB <i class="fa-solid fa-flag-checkered" style="margin-left: 10px;"></i></button>
            </div>
        </form>
        <?php endif; ?>
    </div>
</main>

<script>
function addProductRow() {
    const tbody = document.querySelector('#destuff-tally-table tbody');
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td style="border: 2px solid #000;"><input type="text" placeholder="TRUCK-NO" class="data-input" style="font-weight: 500; background: transparent;"></td>
        <td style="border: 2px solid #000;"><input type="text" placeholder="Product name..." class="data-input" style="font-weight: 500; background: transparent; color: var(--primary);"></td>
        <td style="border: 2px solid #000;">
            <select class="data-input" style="font-weight: 400; background: transparent;">
                <option>BAGS</option>
                <option>BOXES</option>
                <option>PALLETS</option>
                <option>UNITS</option>
            </select>
        </td>
        <td style="border: 2px solid #000;"><input type="number" placeholder="0" class="data-input" style="text-align: center; font-weight: 400; background: transparent;"></td>
        <td style="border: 2px solid #000;"><input type="number" placeholder="0" class="data-input" style="text-align: center; font-weight: 500; background: transparent; color: #16a34a;"></td>
        <td style="border: 2px solid #000;"><input type="number" placeholder="0" class="data-input" style="text-align: center; font-weight: 500; background: transparent; color: #dc2626;"></td>
        <td style="border: 2px solid #000;"><input type="number" placeholder="0" class="data-input" style="text-align: center; font-weight: 400; background: transparent;"></td>
        <td style="border: 2px solid #000;"><input type="number" placeholder="0" class="data-input" style="text-align: center; font-weight: 600; background: transparent; color: var(--primary);"></td>
    `;
    tbody.appendChild(newRow);
}

function addDestuffDocRow() {
    const tbody = document.querySelector('#destuff-evidence-table tbody');
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td style="border: 2px solid #000;">
            <input type="text" placeholder="Enter doc name..." class="data-input" style="font-weight: 500; background: transparent; color: var(--primary);">
        </td>
        <td style="border: 2px solid #000;">
            <input type="text" placeholder="Enter upload remark..." class="data-input" style="font-weight: 400; background: transparent;">
        </td>
        <td align="center" style="border: 2px solid #000;">
            <button type="button" onclick="this.nextElementSibling.click()" style="background: #f1f5f9; color: #64748b; border: 1px solid #e2e8f0; padding: 4px 10px; font-size: 10px; font-weight: 700; cursor: pointer;">
                <i class="fa-solid fa-paperclip"></i> ATTACH
            </button>
            <input type="file" hidden>
        </td>
    `;
    tbody.appendChild(newRow);
}

function showToast(title, message) {
    const container = document.getElementById('toast-container');
    const toast = document.createElement('div');
    toast.className = 'toast';
    toast.innerHTML = `
        <div class="toast-icon"><i class="fa-solid fa-check-double"></i></div>
        <div class="toast-text">
            <span class="toast-title">${title}</span>
            <span class="toast-msg">${message}</span>
        </div>
    `;
    container.appendChild(toast);
    
    // Trigger animation
    setTimeout(() => toast.classList.add('show'), 100);
    
    // Auto-remove
    setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => toast.remove(), 500);
    }, 5000);
}

<?php if (isset($_GET['success'])): ?>
window.addEventListener('DOMContentLoaded', () => {
    showToast('MISSION ACCOMPLISHED', 'Industrial De-stuffing finalized correctly.');
});
<?php endif; ?>
</script>

<?php include $path_prefix . 'includes/footer.php'; ?>
