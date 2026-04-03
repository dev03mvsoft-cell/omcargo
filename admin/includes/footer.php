<?php
/**
 * Global Admin Footer Layout
 */
?>
    </div> <!-- End Dashboard Container -->

    <script>
        function addR(){ 
            const row = document.createElement('div'); 
            row.className = 'registry-row'; 
            row.innerHTML = `<input type="text" class="form-input" placeholder="Type"><input type="file" class="form-input"><button type="button" onclick="this.parentElement.remove()" style="color:var(--danger); background:none; border:none;"><span class="material-symbols-rounded">delete</span></button>`; 
            document.getElementById('reg-hub').appendChild(row); 
        }
        function startScan(){ 
            Swal.fire({title:'Strategic Syncing', text: 'Mapping Coordinates from Invoice...', didOpen:()=>Swal.showLoading()}); 
            setTimeout(()=> {
                document.getElementById('i-no').value = "OCM-IN-004";
                document.getElementById('s-name').value = "GLOBAL CERAMICS\nGujarat, India";
                Swal.fire({icon:'success', title: 'Extraction Success', text: 'All operational parameters established.'}); 
            }, 1500); 
        }
    </script>
</body>
</html>
