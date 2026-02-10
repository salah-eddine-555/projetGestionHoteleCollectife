<x-main>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Page title -->
                <div class="my-5">
                    <h3>My Profile</h3>
                    <hr>
                </div>
                <!-- Form START -->
                <form class="file-upload" method="post" action="/profile">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="hiddenemail" id="" value="{{ Auth::user()->email }}">
                    <div class="row mb-5 gx-5">
                        <!-- Contact detail -->
                        <div class="col-xxl-8 mb-5 mb-xxl-0">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">
                                    <h4 class="mb-4 mt-0">Contact detail</h4>
                                    <!-- First Name -->
                                    <div class="col-md-6">
                                        <label class="form-label">First Name *</label>
                                        <input name="firstname" type="text" class="form-control" placeholder=""
                                            aria-label="First name" value="{{ Auth::user()->firstname }}">
                                    </div>
                                    <!-- Last name -->
                                    <div class="col-md-6">
                                        <label class="form-label">Last Name *</label>
                                        <input name="lastname" type="text" class="form-control" placeholder="" aria-label="Last name"
                                            value="{{Auth::user()->lastname}}">
                                    </div>
                                    <!-- Phone number -->
                                    
                                    
                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Email *</label>
                                        <input name="email" type="email" class="form-control" id="inputEmail4"
                                            value="{{ Auth::user()->email }}">
                                    </div>
                                    
                                </div> <!-- Row END -->
                            </div>
                        </div>
                        <div class="gap-3 d-md-flex justify-content-md-end text-center mb-5">
                        <button type="submit" class="btn btn-primary btn-lg">Update profile</button>
                    </div>
                      
                    </div> <!-- Row END -->

                   

                    
                </form> <!-- Form END -->
            </div>
        </div>
    </div>
</x-main>
