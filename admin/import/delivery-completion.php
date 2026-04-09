<?php
$path_prefix = "../";
$is_root = false;
include $path_prefix . 'includes/header.php';
?>
<?php include $path_prefix . 'includes/sidebar.php'; ?>

<main class="main-area">
    <header class="header" style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 20px 40px; position: sticky; top: 0; z-index: 1000; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <span style="font-size: 10px; font-weight: 850; color: var(--primary); text-transform: uppercase; letter-spacing: 1px; display: block; margin-bottom: 4px;">OPERATIONAL STAGE 05: FINAL DELIVERY</span>
            <h1 class="page-title" style="font-size: 20px; font-weight: 850; margin: 0; color: #01172a;">Consignment Delivery & POD Success</h1>
            <p style="font-size: 11px; color: var(--text-muted); font-weight: 600; margin-top: 2px;">OCM-IMP-24-001 | LAST MILE FULFILLMENT</p>
        </div>
        <div style="display: flex; gap: 15px;">
            <button type="button" class="btn" onclick="window.location.href='de-stuffing.php'" style="background: #f1f5f9; color: #64748b; font-size: 11px; font-weight: 800; border: none; cursor: pointer;">PREVIOUS</button>
            <button type="button" onclick="finalizeDelivery()" class="btn btn-primary" style="padding: 10px 25px; font-size: 11px; font-weight: 850; background: var(--primary); color: #fff; border: none; cursor: pointer;">COMPLETE JOURNEY</button>
        </div>
    </header>
    
    <!-- 1. Minimalist Stepper -->
    <div style="background: #fff; border-bottom: 1px solid #f1f5f9; padding: 25px 40px 0 40px;">
        <div class="minimal-stepper" style="justify-content: flex-start; margin-bottom: 0; border-bottom: none;">
            <div class="m-step completed">01. ARRIVAL</div>
            <div class="m-step completed">02. GATE OUT</div>
            <div class="m-step completed">03. GATE IN</div>
            <div class="m-step completed">04. DE-STUFFING</div>
            <div class="m-step active">05. DELIVERY</div>
        </div>
    </div>

    <div class="content-padding" style="padding: 40px;">

        <form id="delivery-form" action="api_complete_delivery.php" method="POST">
            <div class="form-section">
                <h3 class="section-title"><i class="fa-solid fa-truck-fast"></i> Final Out-for-Delivery Parameters</h3>
                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 24px;">
                    <div class="form-group">
                        <label class="form-label">Dispatch Date from CFS</label>
                        <input type="date" name="dispatch_date" class="form-input" style="font-weight: 700;">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Actual Delivery Date</label>
                        <input type="date" name="delivery_date" class="form-input" style="font-weight: 700;">
                    </div>
                    <div class="form-group">
                        <label class="form-label" style="font-size: 10px; color: var(--primary);">CONSIGNEE / RECIPIENT NAME</label>
                        <input type="text" name="consignee_name" placeholder="Receiver Name" class="form-input" style="font-weight: 850; height: 45px;">
                    </div>
                </div>
            </div>

            <div class="form-section" style="padding: 40px; border: 2px solid #e2e8f0; border-radius: 12px; background: #fff;">
                <h3 class="section-title"><i class="fa-solid fa-house-circle-check"></i> Proof of Delivery (POD) & Document Verification</h3>
                <div style="display: grid; grid-template-columns: 1.5fr 1fr; gap: 40px;">
                    <div>
                        <label class="form-label" style="font-size: 10px; color: var(--primary);">PROOF OF DELIVERY (POD) / SIGNED COPIES</label>
                        <div id="pod-uploader" style="background: #f8fafc; border: 1.5px dashed #cbd5e1; border-radius: 12px; padding: 25px;">
                            <div id="pod-file-inputs">
                                <div style="display: flex; gap: 12px; margin-bottom: 12px;">
                                    <input type="text" name="pod_doc_name[]" class="form-input" placeholder="e.g. POD - Copy 1" style="flex: 1.5; font-weight: 700; background: #fff;">
                                    <input type="file" name="pod_files[]" class="form-input" style="flex: 1; font-weight: 700; background: #fff;">
                                    <button type="button" class="btn" onclick="this.parentElement.remove()" style="background: #fff; border: 1px solid #fee2e2; color: #ef4444; width: 45px; display: flex; align-items: center; justify-content: center; border-radius: 8px;"><i class="fa-solid fa-trash-can"></i></button>
                                </div>
                            </div>
                            <button type="button" onclick="addPODDocument()" class="btn" style="margin-top: 5px; background: var(--primary); color: #fff; font-size: 10px; font-weight: 850; padding: 10px 20px; border-radius: 8px;">
                                <i class="fa-solid fa-plus-circle"></i> ADD MORE DOCUMENTS
                            </button>
                        </div>
                    </div>
                    <div>
                        <label class="form-label" style="font-size: 10px;">DELIVERY FEEDBACK / REMARKS</label>
                        <textarea name="remarks_delivery" rows="3" class="form-input" placeholder="Enter delivery remarks or discrepancies..." style="height: 120px; font-weight: 700; background: #fff; border: 1px solid #cbd5e1;"></textarea>
                    </div>
                </div>

                <div style="margin-top: 40px; text-align: center; border-top: 1px solid #f1f5f9; padding-top: 30px;">
                    <p style="font-size: 11px; font-weight: 800; color: #64748b; margin-bottom: 20px;">By completing this journey, all operational milestones for Job OCM-IMP-24-001 will be locked.</p>
                    <button type="button" onclick="finalizeDelivery()" class="btn btn-primary" style="padding: 16px 80px; font-size: 13px; font-weight: 900; background: var(--primary); color: #fff; border: none; border-radius: 12px; letter-spacing: 1px;">FINALIZE IMPORT PROTOCOL <i class="fa-solid fa-check-double" style="margin-left: 10px;"></i></button>
                </div>
            </div>
        </form>
    </div>
</main>

<script>
    function finalizeDelivery() {
        Swal.fire({
            title: 'Close Import Pipeline?',
            text: 'This will finalize the 5-stage movement for this shipment.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#000',
            cancelButtonColor: '#94a3b8',
            confirmButtonText: 'Yes, Finalize Delivery'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire('Journey Completed!', 'Shipment has been marked as DELIVERED.', 'success').then(() => {
                    window.location.href = '../work-assignment.php';
                });
            }
        });
    }
</script>

<?php include $path_prefix . 'includes/footer.php'; ?>
