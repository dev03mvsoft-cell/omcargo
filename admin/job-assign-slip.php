<?php
$path_prefix = "";
$is_root = false;
include 'includes/header.php';
?>
<?php include 'includes/sidebar.php'; ?>

<main class="main-area">
    <header class="header">
        <div>
            <h1 class="page-title">Job Assignment Slip</h1>
            <p style="font-size: 11px; color: var(--text-muted); font-weight: 600;">Shipment Preview & Operational Assignment</p>
        </div>
        <div>
            <button onclick="window.print()" class="btn" style="background: #f1f5f9; color: var(--text-main); font-size: 11px; border: 1px solid var(--border);">
                <i class="fa-solid fa-print" style="margin-right: 8px;"></i> PRINT SLIP
            </button>
        </div>
    </header>

    <div class="content-padding">
        <div class="assignment-slip">
            <!-- Header Section -->
            <div class="slip-header">
                <div>
                    <h2 style="font-size: 24px; font-weight: 700; color: #000; margin: 0; text-transform: uppercase;">Job Assignment Card</h2>
                    <p style="font-size: 11px; font-weight: 500; color: #64748b; margin-top: 4px;">REFERENCE: OCM-EXP-2024-0001</p>
                </div>
                <div style="text-align: right;">
                    <div style="font-size: 10px; font-weight: 700; color: var(--primary);">INTERNAL DOCUMENT</div>
                    <div style="font-size: 14px; font-weight: 700; border: 2px solid #000; padding: 4px 12px; display: inline-block; margin-top: 8px;">DRAFT SLIP</div>
                </div>
            </div>

            <!-- Main Layout: Exhaustive Metadata Sync -->
            <div class="slip-grid">
                <div class="slip-cell" style="grid-column: span 2;">
                    <span class="slip-label">Shipper / Exporter Details</span>
                    <div class="slip-value">
                        <strong>GLOBAL LOGIX OMAN (GLO)</strong><br>
                        PLOT NO 12, INDUSTRIAL AREA, MUSCAT, OMAN<br>
                        GSTIN: 07HOGPK0877E1ZS | IEC: HOGPK0877E<br>
                        Email: info@globallogix.om | Contact: +968 98104432
                    </div>
                    <div style="margin-top: 20px; display: grid; grid-template-columns: 1fr 1fr; gap: 0; border-top: 1px solid #000;">
                        <div style="padding: 10px; border-right: 1px solid #000;">
                            <span class="slip-label">Consignee (Receiver)</span>
                            <div class="slip-value">
                                <strong>ANATOLIA TILE & STONE, INC.</strong><br>
                                8300 HUNTINGTON ROAD, VAUGHAN, ON L4H 4Z6, CANADA<br>
                                Contact: +1 905-771-3800 | Email: customs@anatolia.ca
                            </div>
                        </div>
                        <div style="padding: 10px;">
                            <span class="slip-label">Notify Party</span>
                            <div class="slip-value">
                                <strong>ANATOLIA TILE & STONE, INC.</strong><br>
                                8300 HUNTINGTON ROAD, VAUGHAN, ON L4H 4Z6, CANADA<br>
                                IEC CODE: HOGPK0877E
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Exhaustive Right Metadata -->
                <div class="slip-cell" style="padding: 0;">
                    <table class="meta-table">
                        <tr>
                            <td width="55%"><strong>Invoice No.</strong></td>
                            <td style="color:red; font-weight:600;">AAAL/24-25/004</td>
                        </tr>
                        <tr>
                            <td><strong>Invoice Date</strong></td>
                            <td style="color:red; font-weight:800;">17-01-2025</td>
                        </tr>
                        <tr>
                            <td><strong>Time of Invoice</strong></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><strong>Shipping Bill No. & Date</strong></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><strong>Purchase Order No.</strong></td>
                            <td style="color:red; font-weight:800;">7000033957</td>
                        </tr>
                        <tr>
                            <td><strong>P.O Date</strong></td>
                            <td style="color:red; font-weight:800;">12-05-2024</td>
                        </tr>
                        <tr>
                            <td><strong>Reverse Charge</strong></td>
                            <td style="color:red; font-weight:800;">Not Applicable</td>
                        </tr>
                        <tr>
                            <td><strong>Transport Mode</strong></td>
                            <td style="color:red; font-weight:800;">By Road to Port</td>
                        </tr>
                        <tr>
                            <td><strong>Port Code</strong></td>
                            <td style="color:red; font-weight:800;">INMUN1</td>
                        </tr>
                        <tr>
                            <td><strong>Delivery Terms</strong></td>
                            <td style="color:red; font-weight:800;">FOB MUNDRA</td>
                        </tr>
                        <tr>
                            <td><strong>Place of Receipt</strong></td>
                            <td style="color:red; font-weight:800;">MUNDRA, INDIA</td>
                        </tr>
                        <tr>
                            <td><strong>Loading Port</strong></td>
                            <td style="color:red; font-weight:800;">MUNDRA, INDIA</td>
                        </tr>
                        <tr>
                            <td><strong>Container No.</strong></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><strong>Carrier/Shipping Line</strong></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><strong>Date of Supply</strong></td>
                            <td style="color:red; font-weight:800;">17-01-2025</td>
                        </tr>
                        <tr>
                            <td><strong>Port of Discharge</strong></td>
                            <td style="color:red; font-weight:800;">SAINT JOHN, NB</td>
                        </tr>
                        <tr>
                            <td><strong>Place of Delivery</strong></td>
                            <td style="color:red; font-weight:800;">TORONTO CY, CANADA</td>
                        </tr>

                    </table>
                </div>
            </div>

            <!-- Commodity Manifest: NO AMOUNT/VALUE AS REQUESTED -->
            <h4 style="font-size: 11px; font-weight: 700; text-transform: uppercase;">Commodity Manifest (Operational)</h4>
            <table class="manifest-table">
                <thead>
                    <tr>
                        <th width="60">SR.</th>
                        <th width="350">DESCRIPTION OF GOODS</th>
                        <th width="100">HSN</th>
                        <th width="60">UOM</th>
                        <th width="100">QUANTITY</th>
                        <th width="150">NET WEIGHT</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td align="center">01</td>
                        <td>FLAT PEBBLE MATTE MOSAIC TILE (NATURAL STONE)</td>
                        <td align="center">68021000</td>
                        <td align="center">PCS</td>
                        <td align="center">10,800</td>
                        <td align="center">24,475 KGS</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" align="right" style="padding: 10px; font-weight: 700;">TOTAL PACKAGES:</td>
                        <td align="center" style="font-weight: 700; background: #f8fafc;">24 PKGS</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="4" align="right" style="padding: 10px; font-weight: 700;">GROSS WEIGHT:</td>
                        <td align="center" style="font-weight: 600; background: #fff;">24,475 KGS</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>

            <!-- Document Checklist -->
            <div style="margin-top: 40px;">
                <h4 style="font-size: 11px; font-weight: 950; text-transform: uppercase; margin-bottom: 20px;">
                    <i class="fa-solid fa-file-shield" style="margin-right: 8px;"></i> Uploaded Document Registry
                </h4>
                <div class="doc-list">
                    <div class="doc-item"><i class="fa-solid fa-circle-check" style="color: #10b981;"></i> COMMERCIAL_INVOICE.PDF</div>
                    <div class="doc-item"><i class="fa-solid fa-circle-check" style="color: #10b981;"></i> PACKING_LIST.PDF</div>
                    <div class="doc-item"><i class="fa-solid fa-circle-check" style="color: #10b981;"></i> BILL_OF_LADING_DRAFT.PDF</div>
                    <div class="doc-item"><i class="fa-solid fa-circle-check" style="color: #10b981;"></i> COO_CERTIFICATE.PDF</div>
                </div>
            </div>

            <!-- Employee Assignment -->
            <div class="assignee-box">
                <div style="display: flex; justify-content: space-between; align-items: flex-end;">
                    <div style="flex: 1;">
                        <label style="font-size: 10px; font-weight: 700; color: var(--primary); text-transform: uppercase; margin-bottom: 12px; display: block;">Strategic Assignment</label>
                        <div style="display: flex; gap: 15px; align-items: center;">
                            <select class="form-input" style="background: white; width: 300px; font-weight: 600;">
                                <option>SELECT EMPLOYEE / AGENT</option>
                                <option selected>RAHUL SHARMA (SENIOR OPERATIONS)</option>
                                <option>AMIT VERMA (DOCUMENTATION HUB)</option>
                                <option>PRIYA SINGH (CUSTOMS CLEARANCE)</option>
                            </select>
                            <button id="assign-btn" class="btn btn-primary" style="padding: 12px 30px; font-size: 11px;">ASSIGN</button>
                        </div>
                    </div>
                    <div onclick="window.location.href='work-assignment.php'" style="text-align: right; cursor: pointer;" title="Go to Work Assignments">
                        <p style="font-size: 10px; font-weight: 600; color: var(--text-muted); margin-bottom: 4px;">SLIP GENERATED AT</p>
                        <p style="font-size: 12px; font-weight: 700;">02-04-2026 | 13:45</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const assignBtn = document.getElementById('assign-btn');
        if (assignBtn) {
            assignBtn.addEventListener('click', function() {
                Swal.fire({
                    title: 'Work Assigned!',
                    text: 'Job successfully delegated to Rahul Sharma (Senior Operations). Operational metadata has been synced.',
                    icon: 'success',
                    confirmButtonText: 'Track Workflow',
                    confirmButtonColor: '#2563eb',
                    showCancelButton: true,
                    cancelButtonText: 'Stay Here'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'work-assignment.php';
                    }
                });
            });
        }
    });
</script>

<?php include 'includes/footer.php'; ?>