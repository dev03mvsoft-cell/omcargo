<?php
$path_prefix = "../../";
$is_root = false;
include $path_prefix . 'includes/header.php';
?>
<?php include $path_prefix . 'includes/sidebar.php'; ?>

<main class="main-area">
    <header class="header" style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 20px 40px; position: sticky; top: 0; z-index: 1000; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <span style="font-size: 13px; font-weight: 600; color: var(--primary); text-transform: uppercase; letter-spacing: 1px; display: block; margin-bottom: 4px;">FACTORY FLOW STAGE 02: HAULAGE DISPATCH</span>
            <h1 class="page-title" style="font-size: 20px; font-weight: 600; margin: 0; color: #01172a;">Port Gate-Out & Transit</h1>
            <p style="font-size: 14px; color: var(--text-muted); font-weight: 400; margin-top: 2px;">OCM-FAC-24-902 | CONTAINER: MAEU4430910</p>
        </div>
        <div style="display: flex; gap: 15px;">
            <button type="button" class="btn" onclick="window.location.href='../../work-assignment.php'" style="background: #f1f5f9; color: #64748b; font-size: 14px; font-weight: 500; border: none; cursor: pointer;">ACTIVE TASKS</button>
            <button type="submit" form="fac-gateout-form" class="btn btn-primary" style="padding: 10px 25px; font-size: 14px; font-weight: 600; background: var(--primary); color: #fff; border: none; cursor: pointer;">SAVE & PROCEED</button>
        </div>
    </header>

    <!-- Tab-Style Progress Bar - Below Header -->
    <div style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 25px 40px 10px 40px;">
        <div style="display: flex; justify-content: center; gap: 60px;">
            <!-- Stage 1 -->
            <div style="padding-bottom: 15px; color: #10b981; font-size: 14px; font-weight: 600; letter-spacing: 1px; text-transform: uppercase;">
                <i class="fa-solid fa-circle-check"></i> 01. PORT ARRIVAL
            </div>
            <!-- Stage 2: Active -->
            <div style="padding-bottom: 15px; border-bottom: 4px solid var(--primary); color: var(--primary); font-size: 14px; font-weight: 600; letter-spacing: 1px; text-transform: uppercase;">
                02. PORT OUT
            </div>
            <!-- Stage 3 -->
            <div style="padding-bottom: 15px; color: #94a3b8; font-size: 14px; font-weight: 600; letter-spacing: 1px; text-transform: uppercase;">
                03. FACTORY IN
            </div>
            <!-- Stage 4 -->
            <div style="padding-bottom: 15px; color: #94a3b8; font-size: 14px; font-weight: 600; letter-spacing: 1px; text-transform: uppercase;">
                04. DE-STUFFING
            </div>
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
                    <button type="button" class="btn" style="background: #f1f5f9; color: var(--primary); font-size: 13px; font-weight: 600; padding: 8px 15px; border-radius: 6px; border: 1px solid #e2e8f0; cursor: pointer;"><i class="fa-solid fa-plus"></i> ADD CONTAINER</button>
                </div>

                <div class="card" style="border: 1px solid var(--border); border-radius: 12px; overflow: hidden; background: #fff;">
                    <table class="table" style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="background: #f8fafc; border-bottom: 1px solid var(--border); text-align: left;">
                                <th style="padding: 16px; font-size: 13px; font-weight: 500; color: var(--text-muted); text-transform: uppercase;">Container ID</th>
                                <th style="padding: 16px; font-size: 13px; font-weight: 500; color: var(--text-muted); text-transform: uppercase;">Truck / Trailer</th>
                                <th style="padding: 16px; font-size: 13px; font-weight: 500; color: var(--text-muted); text-transform: uppercase;">Seal No</th>
                                <th style="padding: 16px; font-size: 13px; font-weight: 500; color: var(--text-muted); text-transform: uppercase;">Gate-Out Time</th>
                                <th style="padding: 16px; font-size: 13px; font-weight: 500; color: var(--text-muted); text-transform: uppercase;">EIR / Dispatch No</th>
                                <th style="padding: 16px; font-size: 13px; font-weight: 500; color: var(--text-muted); text-transform: uppercase;">Gross Weight</th>
                                <th style="padding: 16px; font-size: 13px; font-weight: 500; color: var(--text-muted); text-transform: uppercase; text-align: center;">LR Upload</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="border-bottom: 1px solid var(--border);">
                                <td style="padding: 18px 16px;">
                                    <div style="font-weight: 500; font-size: 14px; color: var(--primary);">MAEU4430910</div>
                                </td>
                                <td style="padding: 18px 16px;">
                                    <input type="text" value="OM-TR-4550" class="form-input" style="font-weight: 400; font-size: 14px; border: none; padding: 0; background: transparent;">
                                </td>
                                <td style="padding: 18px 16px;">
                                    <input type="text" value="MSK-90041" class="form-input" style="font-weight: 400; font-size: 14px; border: none; padding: 0; background: transparent;">
                                </td>
                                <td style="padding: 18px 16px;">
                                    <input type="datetime-local" class="form-input" style="font-weight: 400; font-size: 10.5px; border: none; padding: 0; background: transparent;">
                                    <input type="text" value="OM-TR-4550" class="form-input" style="font-weight: 400; font-size: 14px; padding: 10px 14px; background: #fff; border: 1px solid var(--border); border-radius: 6px;">
                                </td>
                                <td style="padding: 18px 16px;">
                                    <input type="text" value="MSK-90041" class="form-input" style="font-weight: 400; font-size: 14px; padding: 10px 14px; background: #fff; border: 1px solid var(--border); border-radius: 6px;">
                                </td>
                                <td style="padding: 18px 16px;">
                                    <input type="datetime-local" class="form-input" style="font-weight: 400; font-size: 14px; padding: 10px 14px; background: #fff; border: 1px solid var(--border); border-radius: 6px;">
                                </td>
                                <td style="padding: 18px 16px;">
                                    <input type="text" value="EIR-P-904" class="form-input" style="font-weight: 400; font-size: 14px; padding: 10px 14px; background: #fff; border: 1px solid var(--border); border-radius: 6px; font-family: monospace;">
                                </td>
                                <td style="padding: 18px 16px;">
                                    <div style="display: flex; align-items: center; gap: 4px;">
                                        <input type="number" value="45200" class="form-input" style="font-weight: 500; font-size: 14px; padding: 10px 14px; background: #fff; border: 1px solid var(--border); border-radius: 6px;">
                                        <span style="font-size: 14px; font-weight: 600; color: #94a3b8;">KGS</span>
                                    </div>
                                </td>
                                <td style="padding: 18px 16px; text-align: center;">
                                    <button type="button" onclick="this.nextElementSibling.click()" style="background: var(--primary-light); color: var(--primary); border: 1.5px dashed var(--primary); padding: 5px 10px; border-radius: 6px; font-size: 14px; font-weight: 600; cursor: pointer;">
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
                    <button type="button" class="btn" style="background: #f1f5f9; color: var(--primary); font-size: 13px; font-weight: 600; padding: 8px 15px; border-radius: 6px; border: 1px solid #e2e8f0; cursor: pointer;"><i class="fa-solid fa-plus"></i> ADD NEW DOC</button>
                </div>

                <div class="card" style="border: 1px solid var(--border); border-radius: 12px; overflow: hidden; background: #fff;">
                    <table class="table" style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="background: #f8fafc; border-bottom: 1px solid var(--border); text-align: left;">
                                <th style="padding: 16px; font-size: 13px; font-weight: 500; color: var(--text-muted); text-transform: uppercase;">Document Name</th>
                                <th style="padding: 16px; font-size: 13px; font-weight: 500; color: var(--text-muted); text-transform: uppercase;">Upload Remark / Notes</th>
                                <th style="padding: 16px; font-size: 13px; font-weight: 500; color: var(--text-muted); text-transform: uppercase; text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="border-bottom: 1px solid var(--border);">
                                <td style="padding: 15px 16px;">
                                    <input type="text" value="Port Gate Pass" class="form-input" style="font-weight: 500; font-size: 14px; border: none; padding: 0; background: transparent; color: var(--primary);">
                                </td>
                                <td style="padding: 15px 16px;">
                                    <input type="text" placeholder="Enter doc remarks (e.g. Signed & Stamped)..." class="form-input" style="font-weight: 400; font-size: 14px; border: none; padding: 0; background: transparent;">
                                </td>
                                <td style="padding: 15px 16px; text-align: center;">
                                    <button type="button" onclick="this.nextElementSibling.click()" style="background: var(--primary-light); color: var(--primary); border: 1.5px dashed var(--primary); padding: 5px 12px; border-radius: 6px; font-size: 14px; font-weight: 600; cursor: pointer;">
                                        <i class="fa-solid fa-paperclip"></i> ATTACH
                                    </button>
                                    <input type="file" hidden>
                                </td>
                            </tr>
                            <tr style="border-bottom: 1px solid var(--border);">
                                <td style="padding: 15px 16px;">
                                    <input type="text" value="Weightbridge Slip" class="form-input" style="font-weight: 500; font-size: 14px; border: none; padding: 0; background: transparent; color: var(--primary);">
                                </td>
                                <td style="padding: 15px 16px;">
                                    <input type="text" placeholder="Enter weight details or slip no..." class="form-input" style="font-weight: 400; font-size: 14px; border: none; padding: 0; background: transparent;">
                                </td>
                                <td style="padding: 15px 16px; text-align: center;">
                                    <button type="button" style="background: #f1f5f9; color: #64748b; border: 1px solid #e2e8f0; padding: 5px 12px; border-radius: 6px; font-size: 14px; font-weight: 600; cursor: pointer;">
                                        <i class="fa-solid fa-paperclip"></i> ATTACH
                                    </button>
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

<?php include $path_prefix . 'includes/footer.php'; ?>