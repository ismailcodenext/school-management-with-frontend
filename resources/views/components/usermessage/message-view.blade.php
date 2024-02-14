<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Contact User Message View</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Name *</label>
                                <input type="text" class="form-control" id="ViewName">
                                <label class="form-label">Email *</label>
                                <input type="text" class="form-control" id="ViewEmail">
                                <label class="form-label">Mobile *</label>
                                <input type="text" class="form-control" id="ViewMobile">
                                <label class="form-label">Subject *</label>
                                <input type="text" class="form-control" id="ViewSubject">
                                <label class="form-label">Message *</label>
                                <textarea class="form-control" id="ViewMessage" cols="30" rows="10"></textarea>
                                <input class="d-none" id="updateID">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="Update(event)" id="update-btn" class="btn bg-gradient-success" >View</button>
            </div>
        </div>
    </div>
</div>

<script>
async function FillUpUpdateForm(id) {
    try {
        document.getElementById('updateID').value = id;
        showLoader();
        let res = await axios.post("/user-message-by-id", { id: id.toString() }, HeaderToken());
        hideLoader();

        let data = res.data.rows;
        document.getElementById('ViewName').value = data.name;
        document.getElementById('ViewEmail').value = data.email;
        document.getElementById('ViewMobile').value = data.mobile;
        document.getElementById('ViewSubject').value = data.subject;
        document.getElementById('ViewMessage').value = data.message;
    } catch (e) {
        unauthorized(e.response.status);
    }

}
</script>