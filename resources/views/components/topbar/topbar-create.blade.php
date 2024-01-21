<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Topbar</h5>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Topbar Address *</label>
                                <input type="text" class="form-control" id="TopbarAddress">
                                <label class="form-label">Topbar Contact *</label>
                                <input type="text" class="form-control" id="TopbarContact">
                                <label class="form-label">Topbar Email *</label>
                                <input type="email" class="form-control" id="TopbarEmail">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="Save()" id="save-btn" class="btn bg-gradient-success" >Save</button>
                </div>
            </div>
    </div>
</div>


<script>

    async function Save() {

        try {
            let TopbarAddress = document.getElementById('TopbarAddress').value;
            let TopbarContact = document.getElementById('TopbarContact').value;
            let TopbarEmail = document.getElementById('TopbarEmail').value;

            document.getElementById('modal-close').click();
            showLoader();
            let res = await axios.post("/create-topbar",
            {address:TopbarAddress,contact:TopbarContact,email:TopbarEmail},HeaderToken())
            hideLoader();

            if(res.data['status']==="success"){
                successToast(res.data['message']);
                document.getElementById("save-form").reset();
                await getList();
            }
            else{
                errorToast(res.data['message'])
            }

        }catch (e) {
            unauthorized(e.response.status)
        }

    }

</script>
