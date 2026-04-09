<?php
$path_prefix = "../";
$is_root = false;
include $path_prefix . 'includes/header.php';
?>
<?php include $path_prefix . 'includes/sidebar.php'; ?>

<main class="main-area">
    <header class="header" style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 20px 40px; position: sticky; top: 0; z-index: 1000; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <span style="font-size: 8px; font-weight: 850; color: var(--primary); text-transform: uppercase; letter-spacing: 1px; display: block; margin-bottom: 4px;">OPERATIONAL STAGE 03: GATE IN (CFS HUB)</span>
            <h1 class="page-title" style="font-size: 18px; font-weight: 850; margin: 0; color: #01172a;">CFS Arrival & Gate Verification</h1>
            <p style="font-size: 10px; color: var(--text-muted); font-weight: 600; margin-top: 2px;">OCM-IMP-24-001 | CFS HUB MUNDRA</p>
        </div>
        <div style="display: flex; gap: 15px;">
            <button type="button" class="btn" onclick="window.location.href='gate-out.php'" style="background: #f1f5f9; color: #64748b; font-size: 11px; font-weight: 800; border: none; cursor: pointer;">PREVIOUS</button>
            <button type="submit" form="gate-in-form" class="btn btn-primary" style="padding: 10px 25px; font-size: 11px; font-weight: 850; background: var(--primary); color: #fff; border: none; cursor: pointer;">SAVE & PROCEED</button>
        </div>
    </header>

    <!-- 1. Minimalist Stepper -->
    <div style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 25px 40px 0 40px;">
        <div class="minimal-stepper" style="justify-content: flex-start; margin-bottom: 0; border-bottom: none;">
            <div class="m-step completed">01. ARRIVAL</div>
            <div class="m-step completed">02. GATE OUT</div>
            <div class="m-step active">03. GATE IN</div>
            <div class="m-step">04. DE-STUFFING</div>
            <div class="m-step">05. DELIVERY</div>
        </div>
    </div>

    <div class="content-padding" style="padding: 40px;">

        <form id="gate-in-form" action="de-stuffing.php" method="POST" enctype="multipart/form-data">
            <div class="form-section">
                <h3 class="section-title"><i class="fa-solid fa-warehouse"></i> CFS Gate In Registration</h3>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
                    <div class="form-group">
                        <label class="form-label">EIR (Equipment Interchange Receipt) NO</label>
                        <input type="text" name="eir_no" placeholder="Enter EIR Registration..." class="form-input" style="font-weight: 700;">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Gate Official Name</label>
                        <input type="text" name="gate_official" class="form-input" style="font-weight: 700;">
                    </div>
                </div>
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
                <div>
                    <h3 class="section-title" style="margin-bottom: 5px;"><i class="fa-solid fa-clipboard-check"></i> Security Check Matrix (Inbound Inspection)</h3>
                    <p style="font-size: 12px; color: #64748b; font-weight: 600;">Please cross-verify the container data with the Gate-Out logs from Port Terminal.</p>
                </div>
                <button type="button" onclick="addMatrixRow()" class="btn" style="background: var(--secondary); color: #fff; font-size: 12px; font-weight: 850; padding: 12px 25px; border-radius: 10px;">
                    <i class="fa-solid fa-plus-circle"></i> ADD NEW UNIT
                </button>
            </div>

            <div style="overflow-x: auto; border: 1.5px solid #000; border-radius: 8px;">
                <table class="data-table" style="min-width: 100%; border-collapse: collapse;">
                    <thead style="background: #f8fafc; border-bottom: 2.5px solid #000;">
                        <tr>
                            <th style="padding: 15px; border-right: 1px solid #000; color: #000; font-size: 11px; width: 180px;">TRUCK / CNTR ID</th>
                            <th style="padding: 15px; border-right: 1px solid #000; color: #000; font-size: 11px; width: 220px;">CFS ARRIVAL (DATE/TIME)</th>
                            <th style="padding: 15px; border-right: 1px solid #000; color: #000; font-size: 11px; width: 130px;">IN-WEIGHT</th>
                            <th style="padding: 15px; border-right: 1px solid #000; color: #000; font-size: 11px; width: 140px;">SEAL NO</th>
                            <th style="padding: 15px; border-right: 1px solid #000; color: #000; font-size: 11px; width: 180px;">REMARK</th>
                            <th style="padding: 15px; border-right: 1px solid #000; color: #000; font-size: 11px; width: 120px;">GATE IN?</th>

                            <th style="padding: 15px; color: #000; font-size: 11px; width: 15px;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="security-matrix-body">
                        <tr>
                            <td style="padding: 15px; border-right: 1px solid #000; border-bottom: 1px solid #000;">
                                <input type="text" name="h_truck[]" value="GJ12BV8821" placeholder="Truck No" class="form-input" style="border:none; background: transparent; font-size: 13px; font-weight: 850; margin-bottom: 5px; padding: 0;">
                                <input type="text" name="h_cntr[]" value="MSKU1234567" placeholder="Cntr No" class="form-input" style="border:none; background: transparent; font-size: 11px; font-weight: 700; color: var(--primary); padding: 0;">
                            </td>
                            <td style="padding: 15px; border-right: 1px solid #000; border-bottom: 1px solid #000;">
                                <div style="display: flex; gap: 5px;">
                                    <input type="date" name="h_date[]" class="form-input" style="border:1px solid #e2e8f0; font-size: 12px; padding: 5px; height: 35px; width: 100%; font-weight: 700;" value="<?php echo date('Y-m-d'); ?>">
                                    <input type="time" name="h_time[]" class="form-input" style="border:1px solid #e2e8f0; font-size: 12px; padding: 5px; height: 35px; width: 100%; font-weight: 700;" value="<?php echo date('H:i'); ?>">
                                </div>
                            </td>
                            <td style="padding: 15px; border-right: 1px solid #000; border-bottom: 1px solid #000;">
                                <input type="number" name="h_wt[]" value="26044" class="form-input" style="border:1px solid #e2e8f0; font-size: 13px; text-align: center; height: 35px; font-weight: 850;">
                            </td>
                            <td style="padding: 15px; border-right: 1px solid #000; border-bottom: 1px solid #000;">
                                <input type="text" name="h_seal[]" value="B163979" class="form-input" style="border:1px solid #e2e8f0; font-size: 13px; text-align: center; height: 35px; font-weight: 850;">
                            </td>
                            <td style="padding: 15px; border-right: 1px solid #000; border-bottom: 1px solid #000;">
                                <input type="text" name="h_remark[]" placeholder="Enter remarks..." class="form-input" style="border:1px solid #e2e8f0; font-size: 12px; height: 35px; font-weight: 700;">
                            </td>
                            <td style="padding: 15px; border-right: 1px solid #000; border-bottom: 1px solid #000; text-align: center;">
                                <div style="display: flex; background: #f1f5f9; padding: 4px; border-radius: 8px;">
                                    <button type="button" onclick="toggleStatus(this, 'YES')" class="btn-status" style="flex: 1; border: none; background: var(--primary); color: #fff; font-size: 10px; padding: 7px; border-radius: 5px; font-weight: 850;">YES</button>
                                    <button type="button" onclick="toggleStatus(this, 'NO')" class="btn-status" style="flex: 1; border: none; background: transparent; color: #64748b; font-size: 10px; padding: 7px; border-radius: 5px; font-weight: 850;">NO</button>
                                </div>
                                <input type="hidden" name="h_status[]" value="YES">
                            </td>
                            <td style="padding: 15px; text-align: center;">
                                <button type="button" onclick="this.parentElement.parentElement.remove()" style="background: transparent; border: none; color: #ef4444; font-size: 16px; cursor: pointer; opacity: 0.5;"><i class="fa-solid fa-circle-xmark"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div style="margin-top: 30px; display: grid; grid-template-columns: 1fr; gap: 40px;">
                <div>
                    <label class="form-label">EIR Document Copy / Multiple Attachments</label>
                    <div id="file-uploader" style="background: #f8fafc; border: 1px solid var(--border); border-radius: 12px; padding: 25px;">
                        <div id="file-inputs">
                            <div style="display: flex; gap: 12px; margin-bottom: 12px;">
                                <input type="text" name="eir_doc_name[]" class="form-input" placeholder="Document Name (e.g. EIR Front)" style="flex: 1.5; font-weight: 700; background: #fff;">
                                <input type="file" name="eir_files[]" class="form-input" style="flex: 1; font-weight: 700; background: #fff;">
                                <button type="button" class="btn" style="background: #fff; border: 1px solid #fee2e2; color: #ef4444; width: 45px; display: flex; align-items: center; justify-content: center; border-radius: 8px;"><i class="fa-solid fa-trash-can"></i></button>
                            </div>
                        </div>
                        <button type="button" onclick="addEirFile()" class="btn" style="margin-top: 5px; background: var(--primary); color: #fff; font-size: 10px; font-weight: 850; padding: 10px 20px; border-radius: 8px;">
                            <i class="fa-solid fa-plus-circle"></i> ADD MORE DOCUMENTS
                        </button>
                    </div>
                </div>
            </div>
    </div>

    <div style="display: flex; justify-content: flex-end; padding-top: 30px;">
        <button type="submit" class="btn btn-primary" style="padding: 16px 60px; font-size: 12px; font-weight: 850; background: var(--primary); color: #fff; border: none; border-radius: 10px;">CARGO DE-STUFFING <i class="fa-solid fa-arrow-right" style="margin-left: 10px;"></i></button>
    </div>
    </form>
    </div>
    <script>
        function addMatrixRow() {
            const container = document.getElementById('security-matrix-body');
            const tr = document.createElement('tr');
            const today = new Date().toISOString().split('T')[0];
            const now = new Date().toTimeString().split(' ')[0].substring(0, 5);

            tr.innerHTML = `
                <td style="padding: 15px; border-right: 1px solid #000; border-bottom: 1px solid #000;">
                    <input type="text" name="h_truck[]" placeholder="Truck No" class="form-input" style="border:none; background: transparent; font-size: 13px; font-weight: 850; margin-bottom: 5px; padding: 0;">
                    <input type="text" name="h_cntr[]" placeholder="Cntr No" class="form-input" style="border:none; background: transparent; font-size: 11px; font-weight: 700; color: var(--primary); padding: 0;">
                </td>
                <td style="padding: 15px; border-right: 1px solid #000; border-bottom: 1px solid #000;">
                    <div style="display: flex; gap: 5px;">
                        <input type="date" name="h_date[]" class="form-input" style="border:1px solid #e2e8f0; font-size: 12px; padding: 5px; height: 35px; width: 100%; font-weight: 700;" value="${today}">
                        <input type="time" name="h_time[]" class="form-input" style="border:1px solid #e2e8f0; font-size: 12px; padding: 5px; height: 35px; width: 100%; font-weight: 700;" value="${now}">
                    </div>
                </td>
                <td style="padding: 15px; border-right: 1px solid #000; border-bottom: 1px solid #000;">
                    <input type="number" name="h_wt[]" placeholder="Weight" class="form-input" style="border:1px solid #e2e8f0; font-size: 13px; text-align: center; height: 35px; font-weight: 850;">
                </td>
                <td style="padding: 15px; border-right: 1px solid #000; border-bottom: 1px solid #000;">
                    <input type="text" name="h_seal[]" placeholder="Seal NO" class="form-input" style="border:1px solid #e2e8f0; font-size: 13px; text-align: center; height: 35px; font-weight: 850;">
                </td>
                <td style="padding: 15px; border-right: 1px solid #000; border-bottom: 1px solid #000;">
                    <input type="text" name="h_remark[]" placeholder="Enter remarks..." class="form-input" style="border:1px solid #e2e8f0; font-size: 12px; height: 35px; font-weight: 700;">
                </td>
                <td style="padding: 15px; border-right: 1px solid #000; border-bottom: 1px solid #000; text-align: center;">
                    <div style="display: flex; background: #f1f5f9; padding: 4px; border-radius: 8px;">
                        <button type="button" onclick="toggleStatus(this, 'YES')" class="btn-status" style="flex: 1; border: none; background: var(--primary); color: #fff; font-size: 10px; padding: 7px; border-radius: 5px; font-weight: 850;">YES</button>
                        <button type="button" onclick="toggleStatus(this, 'NO')" class="btn-status" style="flex: 1; border: none; background: transparent; color: #64748b; font-size: 10px; padding: 7px; border-radius: 5px; font-weight: 850;">NO</button>
                    </div>
                    <input type="hidden" name="h_status[]" value="YES">
                </td>
                <td style="padding: 15px; text-align: center;">
                    <button type="button" onclick="this.parentElement.parentElement.remove()" style="background: transparent; border: none; color: #ef4444; font-size: 16px; cursor: pointer; opacity: 0.5;"><i class="fa-solid fa-circle-xmark"></i></button>
                </td>
            `;
            container.appendChild(tr);
        }

        function toggleStatus(btn, status) {
            const parent = btn.parentElement;
            const hiddenInput = parent.nextElementSibling;
            const buttons = parent.querySelectorAll('.btn-status');

            buttons.forEach(b => {
                b.style.background = 'transparent';
                b.style.color = '#64748b';
            });

            btn.style.background = status === 'YES' ? 'var(--primary)' : '#ef4444';
            btn.style.color = '#fff';
            hiddenInput.value = status;
        }

        function addEirFile() {
            const container = document.getElementById('file-inputs');
            const div = document.createElement('div');
            div.style.display = 'flex';
            div.style.gap = '12px';
            div.style.marginBottom = '12px';
            div.innerHTML = `
                <input type="text" name="eir_doc_name[]" class="form-input" placeholder="Document Name..." style="flex: 1.5; font-weight: 700; background: #fff;">
                <input type="file" name="eir_files[]" class="form-input" style="flex: 1; font-weight: 700; background: #fff;">
                <button type="button" onclick="this.parentElement.remove()" class="btn" style="background: #fff; border: 1px solid #fee2e2; color: #ef4444; width: 45px; display: flex; align-items: center; justify-content: center; border-radius: 8px;"><i class="fa-solid fa-trash-can"></i></button>
            `;
            container.appendChild(div);
        }
    </script>
</main>

<?php include $path_prefix . 'includes/footer.php'; ?>