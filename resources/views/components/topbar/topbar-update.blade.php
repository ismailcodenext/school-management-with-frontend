<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Topbar</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Address Update *</label>
                                <input type="text" class="form-control" id="TopbarAddressUpdate">
                                <label class="form-label">Contact Update *</label>
                                <input type="text" class="form-control" id="TopbarContactUpdate">
                                <label class="form-label">Email Update *</label>
                                <input type="email" class="form-control" id="TopbarEmailUpdate">
                                <input class="d-none" id="updateID">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="Update()" id="update-btn" class="btn bg-gradient-success" >Update</button>
            </div>
        </div>
    </div>
</div>


<script>


   async function FillUpUpdateForm(id){
       try {
           document.getElementById('updateID').value=id;
           showLoader();
           let res=await axios.post("/topbar-by-id",{id:id},HeaderToken())
           hideLoader();
           document.getElementById('TopbarAddressUpdate').value=res.data['rows']['address'];
           document.getElementById('TopbarContactUpdate').value=res.data['rows']['contact'];
           document.getElementById('TopbarEmailUpdate').value=res.data['rows']['email'];
       }catch (e) {
           unauthorized(e.response.status)
       }
    }


    async function Update() {

       try {

        let TopbarAddressUpdate = document.getElementById('TopbarAddressUpdate').value;
            let TopbarContactUpdate = document.getElementById('TopbarContactUpdate').value;
            let TopbarEmailUpdate = document.getElementById('TopbarEmailUpdate').value;
           let updateID = document.getElementById('updateID').value;

           document.getElementById('update-modal-close').click();
           showLoader();
           let res = await axios.post("/update-topbar",{address:TopbarAddressUpdate,contact:TopbarContactUpdate,email:TopbarEmailUpdate,id:updateID},HeaderToken())
           hideLoader();

           if(res.data['status']==="success"){
               document.getElementById("update-form").reset();
               successToast(res.data['message'])
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
