<?php
$path_prefix = "../../";
$is_root = false;
include $path_prefix . 'includes/header.php';
?>
<?php include $path_prefix . 'includes/sidebar.php'; ?>

<style>
    .btn-upload {
        background: #f0f9ff;
        color: #0369a1;
        border: 1.5px dashed #bae6fd;
        padding: 8px 15px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.2s;
    }
    .btn-upload:hover { background: #e0f2fe; border-color: #7dd3fc; }
</style>

<main class="main-area">
    <header class="header" style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 20px 40px; position: sticky; top: 0; z-index: 1000; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <span style="font-size: 13px; font-weight: 600; color: var(--primary); text-transform: uppercase; letter-spacing: 1px; display: block; margin-bottom: 4px;">FACTORY FLOW STAGE 02: HAULAGE DISPATCH</span>
            <h1 class="page-title" style="font-size: 20px; font-weight: 600; margin: 0; color: #01172a;">Port Gate-Out & Transit</h1>
            <p style="font-size: 14px; color: var(--text-muted); font-weight: 400; margin-top: 2px;">OCM-FAC-24-902 | CONTAINER: MAEU4430910</p>
        </div>
        <div style="display: flex; gap: 15px;">
            <button onclick="window.history.back()" class="btn" style="background:#fff; border: 1px solid #e2e8f0; color: #64748b; font-size: 11px; font-weight: 800;">BACK</button>
            <button type="submit" form="fac-gateout-form" class="btn btn-primary" style="padding: 10px 25px; font-size: 14px; font-weight: 600; background: var(--primary); color: #fff; border: none; cursor: pointer;">SAVE & PROCEED</button>
        </div>
    </header>

    <!-- 1. Minimalist Stepper -->
    <div style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 25px 40px 0 40px;">
        <div class="minimal-stepper" style="justify-content: flex-start; margin-bottom: 0; border-bottom: none;">
            <div class="m-step completed">01. PORT ARRIVAL</div>
            <div class="m-step active">02. GATE OUT</div>
            <div class="m-step">03. FACTORY IN</div>
            <div class="m-step">04. DE-STUFFING</div>
        </div>
    </div>

    <div class="content-padding" style="padding: 40px;">

        <form id="fac-gateout-form" action="factory-arrival.php" method="POST" enctype="multipart/form-data">
            <div class="form-section">
                <!-- Transport Company Header -->
                <div style="background: #f8fafc; border: 1px solid var(--border); border-radius: 12px; padding: 24px; margin-bottom: 25px; display: grid; grid-template-columns: 1fr 1.5fr 1fr; gap: 30px; align-items: center;">
                    <div>
                        <label class="form-label">Transport Supply Co.</label>
                        <select name="transporter_id" class="form-input" style="font-weight: 500; color: var(--primary);">
                            <option>AL-HOSNI LOGISTICS (FETCHED)</option>
                            <option>MAJAN TRANSPORT</option>
                            <option>--- ADD NEW COMPANY ---</option>
                        </select>
                    </div>
                    <div>
                        <label class="form-label">Search / Manual Transporter Name</label>
                        <input type="text" placeholder="Type to search existing or enter new..." class="form-input" style="font-weight: 400;">
                    </div>
                    <div>
                        <label class="form-label">Total Weight Unit</label>
                        <select class="form-input" style="font-weight: 400;">
                            <option>KILOGRAMS (KGS)</option>
                            <option>METRIC TONS (MT)</option>
                        </select>
                    </div>
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h3 class="section-title" style="margin: 0;"><i class="fa-solid fa-truck-moving"></i> Container Loading & Weight Bridge Dispatch</h3>
                    <button type="button" class="btn" onclick="addContainerRow()" style="background: #f1f5f9; color: var(--primary); font-size: 13px; font-weight: 600; padding: 8px 15px; border-radius: 6px; border: 1px solid #e2e8f0; cursor: pointer;"><i class="fa-solid fa-plus"></i> ADD CONTAINER</button>
                </div>


                <div class="card" style="padding: 25px; overflow-x: auto;">
                    <table class="classic-table" id="container-table">
                        <thead>
                            <tr>
                                <th width="180">Container ID</th>
                                <th>Truck / Trailer</th>
                                <th>Seal No</th>
                                <th width="180">Gate-Out Time</th>
                                <th>EIR / Dispatch No</th>
                                <th width="150">Gross Weight</th>
                                <th width="120" style="text-align: center;">LR Upload</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="border: 2px solid #000;">
                                    <input type="text" value="MAEU4430910" class="data-input" style="font-weight: 700; color: var(--primary); background: transparent;">
                                </td>
                                <td style="border: 2px solid #000;">
                                    <input type="text" value="OM-TR-4550" class="data-input" placeholder="Truck No">
                                </td>
                                <td style="border: 2px solid #000;">
                                    <input type="text" value="MSK-90041" class="data-input" placeholder="Seal No">
                                </td>
                                <td style="border: 2px solid #000;">
                                    <input type="datetime-local" class="data-input" style="font-size: 11px;">
                                </td>
                                <td style="border: 2px solid #000;">
                                    <input type="text" value="EIR-P-904" class="data-input" style="font-family: monospace;" placeholder="EIR No">
                                </td>
                                <td style="border: 2px solid #000;">
                                    <div style="display: flex; align-items: center;">
                                        <input type="number" value="45200" class="data-input" style="width: calc(100% - 30px);">
                                        <span style="font-size: 10px; font-weight: 800; color: #94a3b8; width: 30px; text-align: center;">KGS</span>
                                    </div>
                                </td>
                                <td align="center" style="border: 2px solid #000;">
                                    <button type="button" onclick="this.nextElementSibling.click()" class="btn-upload" style="padding: 4px 10px; font-size: 10px;">
                                        <i class="fa-solid fa-cloud-arrow-up"></i> LR
                                    </button>
                                    <input type="file" hidden>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>


            <div class="form-section">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h3 class="section-title" style="margin: 0;"><i class="fa-solid fa-file-invoice"></i> Port Exit Documentation</h3>
                    <button type="button" onclick="addDocRow()" class="btn" style="background: #f1f5f9; color: var(--primary); font-size: 13px; font-weight: 600; padding: 8px 15px; border-radius: 6px; border: 1px solid #e2e8f0; cursor: pointer;"><i class="fa-solid fa-plus"></i> ADD NEW DOC</button>
                </div>


                <div class="card" style="padding: 25px; overflow-x: auto;">
                    <table class="classic-table" id="doc-table">
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
                                    <input type="text" value="Port Gate Pass" class="data-input" style="font-weight: 700; color: var(--primary);">
                                </td>
                                <td style="border: 2px solid #000;">
                                    <input type="text" placeholder="Enter doc remarks (e.g. Signed & Stamped)..." class="data-input">
                                </td>
                                <td align="center" style="border: 2px solid #000;">
                                    <button type="button" onclick="this.nextElementSibling.click()" class="btn-upload" style="background: #fdf2f8; color: #be185d; border-color: #fbcfe8; padding: 4px 10px; font-size: 10px;">
                                        <i class="fa-solid fa-paperclip"></i> ATTACH
                                    </button>
                                    <input type="file" hidden>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: 2px solid #000;">
                                    <input type="text" value="Weightbridge Slip" class="data-input" style="font-weight: 700; color: var(--primary);">
                                </td>
                                <td style="border: 2px solid #000;">
                                    <input type="text" placeholder="Enter weight details or slip no..." class="data-input">
                                </td>
                                <td align="center" style="border: 2px solid #000;">
                                    <button type="button" onclick="this.nextElementSibling.click()" class="btn-upload" style="background: #f1f5f9; color: #64748b; border: 1px solid #e2e8f0; padding: 4px 10px; font-size: 10px;">
                                        <i class="fa-solid fa-paperclip"></i> ATTACH
                                    </button>
                                    <input type="file" hidden>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <div class="form-group" style="margin-top: 25px;">
                    <label class="form-label">Transit Route Instructions</label>
                    <textarea name="route_remarks" rows="2" class="form-input" placeholder="Enter specific route or haulage instructions..." style="height: 80px; font-weight: 400;"></textarea>
                </div>
            </div>

            <div style="display: flex; justify-content: flex-end; padding-top: 20px;">
                <button type="submit" class="btn btn-primary" style="padding: 16px 60px; font-size: 14px; font-weight: 600; background: var(--primary); color: #fff; border: none; border-radius: 10px;">ARRIVE AT FACTORY <i class="fa-solid fa-industry" style="margin-left: 10px;"></i></button>
            </div>
        </form>
    </div>
</main>

<script>
    function addContainerRow() {
        const tbody = document.querySelector('#container-table tbody');
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td style="border: 2px solid #000;"><input type="text" placeholder="Container ID" class="data-input"></td>
            <td style="border: 2px solid #000;"><input type="text" placeholder="Truck No" class="data-input"></td>
            <td style="border: 2px solid #000;"><input type="text" placeholder="Seal No" class="data-input"></td>
            <td style="border: 2px solid #000;"><input type="datetime-local" class="data-input" style="font-size: 11px;"></td>
            <td style="border: 2px solid #000;"><input type="text" placeholder="EIR No" class="data-input" style="font-family: monospace;"></td>
            <td style="border: 2px solid #000;">
                <div style="display: flex; align-items: center;">
                    <input type="number" placeholder="0" class="data-input" style="width: calc(100% - 30px);">
                    <span style="font-size: 10px; font-weight: 800; color: #94a3b8; width: 30px; text-align: center;">KGS</span>
                </div>
            </td>
            <td align="center" style="border: 2px solid #000;">
                <button type="button" onclick="this.nextElementSibling.click()" class="btn-upload" style="padding: 4px 10px; font-size: 10px;">
                    <i class="fa-solid fa-cloud-arrow-up"></i> LR
                </button>
                <input type="file" hidden>
            </td>
        `;
        tbody.appendChild(newRow);
    }

    function addDocRow() {
        const tbody = document.querySelector('#doc-table tbody');
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td style="border: 2px solid #000;"><input type="text" placeholder="Document Name" class="data-input"></td>
            <td style="border: 2px solid #000;"><input type="text" placeholder="Enter upload remark..." class="data-input"></td>
            <td align="center" style="border: 2px solid #000;">
                <button type="button" onclick="this.nextElementSibling.click()" class="btn-upload" style="background: #f1f5f9; color: #64748b; border: 1px solid #e2e8f0; padding: 4px 10px; font-size: 10px;">
                    <i class="fa-solid fa-paperclip"></i> ATTACH
                </button>
                <input type="file" hidden>
            </td>
        `;
        tbody.appendChild(newRow);
    }
</script>

<?php include $path_prefix . 'includes/footer.php'; ?>