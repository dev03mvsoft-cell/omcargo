<?php
$path_prefix = "";
$is_root = false;
include 'includes/header.php';
?>
<?php include 'includes/sidebar.php'; ?>

<style>
    .line-hub { padding: 40px; background: #fff; }
    
    /* Minimalist Stepper */
    .minimal-stepper { display: flex; gap: 40px; margin-bottom: 50px; border-bottom: 1px solid #f1f5f9; padding-bottom: 15px; }
    .m-step { font-size: 11px; font-weight: 800; color: #94a3b8; text-transform: uppercase; letter-spacing: 1px; position: relative; padding-bottom: 15px; }
    .m-step.completed { color: #059669; }
    .m-step.active { color: var(--primary); }
    .m-step.active::after { content: ''; position: absolute; bottom: -1px; left: 0; width: 100%; height: 2px; background: var(--primary); }

    .input-simple { width: 100%; border: 1px solid #e2e8f0; border-radius: 4px; padding: 10px 12px; font-size: 12px; font-weight: 700; color: #1e293b; background: #fcfdfe; }
    .input-simple:focus { border-color: var(--primary); outline: none; background: #fff; }
    
    .section-title { font-size: 11px; font-weight: 900; color: #1e293b; text-transform: uppercase; margin-bottom: 25px; display: flex; align-items: center; gap: 8px; border-left: 3px solid var(--primary); padding-left: 15px; }
    .s-label { font-size: 10px; font-weight: 800; color: #64748b; text-transform: uppercase; margin-bottom: 8px; display: block; }
</style>

<main class="main-area">
    <header class="header" style="border-bottom: 1px solid #f1f5f9; background: #fff; padding: 20px 40px;">
        <div>
            <h1 class="page-title" style="font-size: 18px; font-weight: 900;">Shipping Line Process</h1>
            <p style="font-size: 10px; color: #64748b; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;">STAGE 04: CARRIER MANIFEST & S/I SUBMISSION</p>
        </div>
        <div style="display: flex; gap: 15px;">
            <button onclick="window.location.href='booking-status.php'" class="btn" style="background:#fff; border: 1px solid #e2e8f0; color: #64748b; font-size: 11px; font-weight: 800;">BACK</button>
            <button onclick="submitLineProcess()" class="btn btn-primary" style="padding: 10px 25px; font-size: 11px; font-weight: 800;">SUBMIT TO LINE</button>
        </div>
    </header>

    <div class="line-hub">
        <!-- 1. Minimal Stepper -->
        <div class="minimal-stepper">
            <div class="m-step completed">01. CARTING</div>
            <div class="m-step completed">02. CHECKLIST</div>
            <div class="m-step completed">03. BOOKING</div>
            <div class="m-step active">04. LINING</div>
            <div class="m-step">05. GATE IN</div>
            <div class="m-step">06. ONBOARD</div>
        </div>

        <!-- 2. Shipping Instruction (S/I) Registry -->
        <div class="section-title">Shipping Line Documentation (S/I)</div>
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 50px;">
            <div>
                <label class="s-label">Manifest Control No.</label>
                <input type="text" class="input-simple" placeholder="E.G. MAN-7724937">
            </div>
            <div>
                <label class="s-label">S/I Submission Status</label>
                <select class="input-simple">
                    <option>PENDING</option>
                    <option>DRAFT SENT</option>
                    <option>LINE CONFIRMED</option>
                </select>
            </div>
            <div>
                <label class="s-label">VGM Status</label>
                <select class="input-simple">
                    <option>PENDING</option>
                    <option>SUBMITTED (YES)</option>
                </select>
            </div>
        </div>

        <!-- 3. Bill of Lading Draft Control -->
        <div class="section-title">Final Bill of Lading (B/L) Control</div>
        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; margin-bottom: 50px;">
            <div>
                <label class="s-label">Master B/L Draft No.</label>
                <input type="text" class="input-simple" placeholder="ENTER MBL NO.">
            </div>
            <div>
                <label class="s-label">House B/L Ref (Internal)</label>
                <input type="text" class="input-simple" placeholder="ENTER HBL NO.">
            </div>
            <div style="grid-column: span 2;">
                <label class="s-label">Carrier Verification Remarks</label>
                <textarea class="input-simple" style="height: 100px; resize: none;" placeholder="ENTER REMARKS FOR THE SHIPPING LINE..."></textarea>
            </div>
        </div>

        <!-- 4. Supporting Manifest Documents -->
        <div class="section-title">Supporting Manifest Uploads</div>
        <div style="background: #f8fafc; border: 2px dashed #e2e8f0; padding: 40px; border-radius: 8px; text-align: center;">
            <i class="fa-solid fa-file-invoice" style="font-size: 32px; color: #cbd5e1; margin-bottom: 15px;"></i>
            <h4 style="font-size: 13px; font-weight: 800; color: #1e293b;">DROP FINAL CARGO MANIFEST</h4>
            <p style="font-size: 10px; color: #94a3b8; font-weight: 700; margin-top: 5px;">PDF OR EXCEL FOR SHIPPING LINE VERIFICATION</p>
            <button class="btn" style="background:#fff; border: 1px solid #e2e8f0; color: #2563eb; font-size: 10px; font-weight: 800; padding: 10px 25px; margin-top: 20px;">BROWSE FILES</button>
        </div>
    </div>
</main>

<script>
    function submitLineProcess() {
        Swal.fire({
            title: 'Line Process Complete',
            text: 'Carrier Manifest sent. Moving to Stage 05: Gate In.',
            icon: 'success',
            confirmButtonColor: '#2563eb'
        }).then(() => {
            window.location.href = 'gate-in.php';
        });
    }
</script>

<?php include 'includes/footer.php'; ?>
