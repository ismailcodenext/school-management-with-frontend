<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Create New Student Admission</h6>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <h6 class="modal-title" id="exampleModalLabel">Student Information:</h6>
                            <div class="col-12 p-1">
                                <label class="form-label">First Name *</label>
                                <input type="text" class="form-control" id="heroSliderTitle">
                                <label class="form-label">Last Name *</label>
                                <input type="text" class="form-control" id="heroSliderSubTitle">
                                <label for="startDate">Date of Birth</label>
                                <input id="startDate" class="form-control" type="date" />
                                <label class="form-label">Mobile *</label>
                                <input type="text" class="form-control" id="heroSliderSubTitle">
                                <label class="form-label">Email *</label>
                                <input type="text" class="form-control" id="heroSliderSubTitle">
                                <label class="form-label">Select Gender *</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others">Others</option>
                                </select>
                                <label class="form-label">Religion *</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Select Religion</option>
                                    <option value="Ismail">Ismail</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Others">Others</option>
                                </select>
                                <label class="form-label">Blood Group *</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Select Blood Group</option>
                                    <option value="A+">A+</option>
                                    <option value="AB+">AB+</option>
                                    <option value="B+">B+</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                                <br/>
                                <img class="w-15" id="newImg" src="{{asset('images/default.jpg')}}"/>
                                <br/>
                                <label class="form-label">Principal Photo</label>
                                <input oninput="newImg.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control" id="img_url">
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
            let heroSliderTitle = document.getElementById('heroSliderTitle').value;
            let heroSliderSubTitle = document.getElementById('heroSliderSubTitle').value;
            let imgInput = document.getElementById('img_url');

            // Check if a file is selected
            if (!imgInput.files || imgInput.files.length === 0) {
                errorToast("Photo Required !");
                return;
            }

            let imgFile = imgInput.files[0];

            if (heroSliderTitle.length === 0 || heroSliderSubTitle.length === 0) {
                errorToast("All fields are required!");
            } else {
                document.getElementById('modal-close').click();

                let formData = new FormData();
                formData.append('heroSliderTitle', heroSliderTitle);
                formData.append('heroSliderSubTitle', heroSliderSubTitle);
                formData.append('img', imgFile); // Append the file, not the file URL

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        ...HeaderToken().headers // Include headers from HeaderToken function
                    }
                }

                showLoader();
                let res = await axios.post("/create-hero-slider", formData, config);
                hideLoader();

                if (res.data['status'] === "success") {
                    successToast(res.data['message']);
                    document.getElementById("save-form").reset();
                    await getList();
                } else {
                    errorToast(res.data['message'])
                }
            }

        } catch (e) {
            unauthorized(e.response.status)
        }
    }

</script>
