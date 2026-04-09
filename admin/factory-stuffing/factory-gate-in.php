<?php
$path_prefix = "../";
$is_root = false;
include $path_prefix . 'includes/header.php';
?>
<?php include $path_prefix . 'includes/sidebar.php'; ?>

<style>
    .gate-hub {
        padding: 40px;
        background: #fff;
    }

    /* Operational Stepper */
    .minimal-stepper {
        display: flex;
        gap: 40px;
        margin-bottom: 50px;
        border-bottom: 1px solid #f1f5f9;
        padding-bottom: 15px;
    }

    .m-step {
        font-size: 11px;
        font-weight: 800;
        color: #94a3b8;
        text-transform: uppercase;
        letter-spacing: 1px;
        position: relative;
        padding-bottom: 15px;
    }

    .m-step.completed {
        color: #059669;
    }

    .m-step.active {
        color: var(--primary);
    }

    .m-step.active::after {
        content: '';
        position: absolute;
        bottom: -1px;
        left: 0;
        width: 100%;
        height: 2px;
        background: var(--primary);
    }

    /* Classic Grouped Table */
    .classic-table {
        width: 100%;
        border-collapse: collapse;
    }

    .classic-table th {
        background: #f8fafc;
        padding: 12px 15px;
        font-size: 9px;
        font-weight: 950;
        color: #475569;
        text-transform: uppercase;
        text-align: left;
        border-bottom: 2px solid #e2e8f0;
        white-space: nowrap;
    }

    .classic-table td {
        padding: 12px 15px;
        border-bottom: 1px solid #f1f5f9;
        font-size: 11px;
        font-weight: 700;
        color: #1e293b;
    }

    .classic-table tr:hover {
        background: #fcfdfe;
    }

    .form-input {
        width: 100%;
        border: 1px solid #e2e8f0;
        border-radius: 4px;
        padding: 8px 12px;
        font-size: 11px;
        font-weight: 600;
        color: #1e293b;
        background: #fff;
    }

    .form-input:focus {
        border-color: var(--primary);
        outline: none;
    }

    .status-badge {
        padding: 5px 12px;
        font-size: 9px;
        font-weight: 900;
        border-radius: 20px;
        text-transform: uppercase;
    }

    .status-pending { background: #fff7ed; color: #c2410c; }
    .status-arrived { background: #ecfdf5; color: #059669; }
</style>

<main class="main-area">
    <header class="header" style="border-bottom: 1px solid #f1f5f9; background: #fff; padding: 25px 40px; position: sticky; top: 0; z-index: 1000;">
        <div>
            <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 5px;">
                <span style="padding: 4px 10px; background: #fff7ed; color: #ea580c; font-size: 9px; font-weight: 850; border-radius: 4px;">EMPTY ARRIVAL</span>
                <p style="font-size: 10px; color: #94a3b8; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">STAGE 01 • FACTORY GATE-IN (RECEPTION)</p>
            </div>
            <h1 class="page-title" style="font-size: 22px; font-weight: 950; letter-spacing: -0.5px; margin: 0;">Factory <span style="color: var(--primary);">Gate-In</span> Registry</h1>
        </div>
        <div style="display: flex; gap: 15px;">
            <button onclick="window.history.back()" class="btn" style="background:#fff; border: 1px solid #e2e8f0; color: #64748b; font-size: 11px; font-weight: 800; padding: 12px 25px; border-radius: 8px;">BACK</button>
            <button onclick="submitGateIn()" class="btn" style="background: var(--primary); color: #fff; padding: 12px 35px; font-size: 11px; font-weight: 800; border-radius: 8px; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);">NEXT: LOADING CARGO</button>
        </div>
    </header>

    <div class="gate-hub">
        <!-- Operational Stepper -->
        <div class="minimal-stepper">
            <div class="m-step active">01. FACTORY GATE IN</div>
            <div class="m-step">02. LOADING CARGO</div>
            <div class="m-step">03. CHECKLIST</div>
            <div class="m-step">04. GATE IN (PORT)</div>
            <div class="m-step">05. ONBOARD</div>
        </div>

        <div style="background: #fff; border: 1px solid #e2e8f0; border-radius: 8px; overflow: hidden;">
            <div style="padding: 20px; background: #f8fafc; border-bottom: 2px solid #1e293b; display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h4 style="font-size: 12px; font-weight: 950; color: #1e293b; margin: 0;">Arrival Monitoring (Empty In)</h4>
                    <p style="font-size: 9px; color: #64748b; font-weight: 600; text-transform: uppercase; margin-top: 4px;">Tracking Truck Entry & Container Physical Handover</p>
                </div>
                <div style="display: flex; gap: 15px; align-items: center;">
                    <div style="display: flex; gap: 10px;">
                        <div class="status-badge status-pending" id="count-pending">Wait: 0</div>
                        <div class="status-badge status-arrived" id="count-arrived">Arrived: 0</div>
                    </div>
                    <button type="button" onclick="addArrivalRow()" class="btn" style="background: var(--primary); color: #fff; font-size: 9px; font-weight: 950; padding: 8px 15px; border:none; border-radius: 4px;">+ ADD ARRIVAL</button>
                </div>
            </div>

            <div style="overflow-x: auto;">
                <table class="classic-table" style="min-width: 1400px; border-collapse: separate; border-spacing: 0;">
                <thead>
                    <tr>
                        <th width="60" style="text-align: center;">SR.</th>
                        <th width="160">Truck Number</th>
                        <th width="160">Container No.</th>
                        <th width="140">LR Number</th>
                        <th width="160">Empty Pickup Date</th>
                        <th width="200">Arrival Time (Factory)</th>
                        <th width="160">Gate-In Status</th>
                        <th width="150">Gate Pass / Doc</th>
                        <th>Security Remarks</th>
                    </tr>
                </thead>
                <tbody id="factory-gate-body">
                    <!-- Hydrated via localStorage -->
                </tbody>
            </table>
        </div>

        <div style="margin-top: 30px; display: grid; grid-template-columns: 1fr 1.5fr; gap: 30px;">
            <div style="padding: 25px; background: #fff; border: 1px solid #e2e8f0; border-radius: 8px;">
                <h5 style="font-size: 10px; font-weight: 950; color: #1e293b; text-transform: uppercase; margin-bottom: 15px;">Security Check Protocol</h5>
                <ul style="font-size: 11px; color: #64748b; line-height: 1.8; padding-left: 20px;">
                    <li>Verify Truck Plate number matches Assignment Slip.</li>
                    <li>Inspect Empty Container integrity (Holes/Light test).</li>
                    <li>Record exact Factory Gate-In time.</li>
                    <li>Confirm LR (Lorry Receipt) existence.</li>
                </ul>
            </div>
            
            <div style="padding: 25px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h5 style="font-size: 10px; font-weight: 950; color: #1e293b; text-transform: uppercase; margin: 0;"><i class="fa-solid fa-folder-tree"></i> Global Document Registry</h5>
                    <button type="button" onclick="addRegDoc()" class="btn" style="font-size: 8px; font-weight: 900; background: #1e293b; color: #fff; padding: 5px 12px;">+ ATTACH ASSET</button>
                </div>
                <div id="global-reg-hub" style="display: grid; gap: 10px;">
                    <div style="display: flex; gap: 10px;">
                        <input type="text" class="form-input" placeholder="Document Name (e.g. Master Gate Pass)" style="flex: 1;">
                        <input type="file" class="form-input" style="flex: 1;">
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
            Swal.fire('Identity Required', 'Start by creating a Factory Job first.', 'info').then(() => {
                window.location.href = 'job-create.php';
            });
            return;
        }

        const job = JSON.parse(rawData);
        const tbody = document.getElementById('factory-gate-body');

        if (job.items && job.items.length > 0) {
            job.items.forEach((item, idx) => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td align="center" style="font-weight: 850; color: #94a3b8;">${(idx+1).toString().padStart(2, '0')}</td>
                    <td><input type="text" class="form-input" value="${item.truck}" style="font-weight: 900; text-transform: uppercase;"></td>
                    <td><input type="text" class="form-input" value="${item.container}" style="font-weight: 900; text-transform: uppercase; color: var(--primary);"></td>
                    <td><input type="text" class="form-input" value="${item.lrNo || ''}" placeholder="LR-XXXX"></td>
                    <td><input type="text" class="form-input" value="${item.pDate || job.invoiceDate || 'TBD'}" readonly style="background: #f8fafc;"></td>
                    <td><input type="datetime-local" class="form-input" value="<?php echo date('Y-m-d\TH:i'); ?>"></td>
                    <td>
                        <select class="form-input gate-status" onchange="syncCounts()">
                            <option value="pending">AWAITING (PENDING)</option>
                            <option value="arrived" selected>ARRIVED & INSPECTED</option>
                        </select>
                    </td>
                    <td>
                        <div style="display: flex; gap: 5px; align-items: center;">
                            <button type="button" class="btn btn-secondary" style="padding: 5px 10px; font-size: 10px;" onclick="this.nextElementSibling.click()"><i class="fa-solid fa-file-arrow-up"></i></button>
                            <input type="file" hidden>
                            <span style="font-size: 8px; color: #94a3b8; font-weight: 800;">PDF/JPG</span>
                        </div>
                    </td>
                    <td><input type="text" class="form-input" placeholder="Condition OK..."></td>
                `;
                tbody.appendChild(tr);
            });
            syncCounts();
        }
    });

    function syncCounts() {
        const statuses = document.querySelectorAll('.gate-status');
        let arrived = 0;
        let pending = 0;
        statuses.forEach(s => {
            if (s.value === 'arrived') arrived++;
            else pending++;
        });
        document.getElementById('count-pending').innerText = 'Wait: ' + pending;
        document.getElementById('count-arrived').innerText = 'Arrived: ' + arrived;
    }

    function submitGateIn() {
        Swal.fire({
            title: 'Empty Checkpoint Logged',
            text: 'Security clearance obtained. Container is now authorized for Stuffing / Loading.',
            icon: 'success',
            confirmButtonColor: 'var(--primary)',
            confirmButtonText: 'Proceed to Loading'
        }).then(() => {
            window.location.href = 'loading-cargo.php';
        });
    }
    function addArrivalRow() {
        const tbody = document.getElementById('factory-gate-body');
        const count = tbody.querySelectorAll('tr').length + 1;
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td align="center" style="font-weight: 850; color: #94a3b8;">${count.toString().padStart(2, '0')}</td>
            <td><input type="text" class="form-input" placeholder="UNPLANNED TRUCK" style="font-weight: 900; text-transform: uppercase;"></td>
            <td><input type="text" class="form-input" placeholder="UNIT NO" style="font-weight: 900; text-transform: uppercase; color: var(--primary);"></td>
            <td><input type="text" class="form-input" placeholder="LR-NEW"></td>
            <td><input type="date" class="form-input"></td>
            <td><input type="datetime-local" class="form-input" value="<?php echo date('Y-m-d\TH:i'); ?>"></td>
            <td>
                <select class="form-input gate-status" onchange="syncCounts()">
                    <option value="pending">AWAITING (PENDING)</option>
                    <option value="arrived" selected>ARRIVED & INSPECTED</option>
                </select>
            </td>
            <td>
                <div style="display: flex; gap: 5px; align-items: center;">
                    <button type="button" class="btn btn-secondary" style="padding: 5px 10px; font-size: 10px;" onclick="this.nextElementSibling.click()"><i class="fa-solid fa-file-arrow-up"></i></button>
                    <input type="file" hidden>
                    <span style="font-size: 8px; color: #94a3b8; font-weight: 800;">PDF/JPG</span>
                </div>
            </td>
            <td>
                <div style="display: flex; gap: 8px; align-items: center;">
                    <input type="text" class="form-input" placeholder="Remarks..." style="flex: 1;">
                    <button type="button" onclick="this.closest('tr').remove()" style="border:none; background:transparent; color:#fca5a5; cursor:pointer;"><i class="fa-solid fa-circle-xmark"></i></button>
                </div>
            </td>
        `;
        tbody.appendChild(tr);
        syncCounts();
    }

    function addRegDoc() {
        const hub = document.getElementById('global-reg-hub');
        const div = document.createElement('div');
        div.style.display = 'flex';
        div.style.gap = '10px';
        div.innerHTML = `<input type="text" class="form-input" placeholder="Document Name" style="flex: 1;"><input type="file" class="form-input" style="flex: 1;"><button type="button" onclick="this.parentElement.remove()" style="border:none; background:transparent; color:#fca5a5;"><i class="fa-solid fa-circle-xmark"></i></button>`;
        hub.appendChild(div);
    }
</script>

<?php include $path_prefix . 'includes/footer.php'; ?>
