<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Blog And News</h6>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Title *</label>
                                <input type="text" class="form-control" id="blogNewsTitle">
                                <label class="form-label">Details *</label>
                                <input type="text" class="form-control" id="blogNewsDetails">
                                <label class="form-label mt-1">Category *</label>
                                <select class="form-select" aria-label="Default select example" id="blogNewsCategory">
                                    <option selected>Select Category</option>
                                    <option value="সকল">সকল</option>
                                    <option value="সাংস্কৃতিক অনুষ্ঠান">সাংস্কৃতিক অনুষ্ঠান</option>
                                    <option value="ক্রীড়া দিবস">ক্রীড়া দিবস</option>
                                    <option value="বাগান করা">বাগান করা</option>
                                    <option value="পুরস্কার বিতরণী অনুষ্ঠান">পুরস্কার বিতরণী অনুষ্ঠান</option>
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
            let blogNewsTitle = document.getElementById('blogNewsTitle').value;
            let blogNewsDetails = document.getElementById('blogNewsDetails').value;
            let blogNewsCategory = document.getElementById('blogNewsCategory').value;
            let imgInput = document.getElementById('img_url');

            // Check if a file is selected
            if (!imgInput.files || imgInput.files.length === 0) {
                errorToast("Photo Required !");
                return;
            }

            let imgFile = imgInput.files[0];

            if (blogNewsTitle.length === 0 || blogNewsDetails.length === 0 || blogNewsCategory.length === 0) {
                errorToast("All fields are required!");
            } else {
                document.getElementById('modal-close').click();

                let formData = new FormData();
                formData.append('blogNewsTitle', blogNewsTitle);
                formData.append('blogNewsDetails', blogNewsDetails);
                formData.append('blogNewsCategory', blogNewsCategory);
                formData.append('img', imgFile); // Append the file, not the file URL

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        ...HeaderToken().headers // Include headers from HeaderToken function
                    }
                }

                showLoader();
                let res = await axios.post("/create-blog-news", formData, config);
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
