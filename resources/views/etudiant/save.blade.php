{{ $etudiants->links('pagination::bootstrap-5') }}

                            <ul class="dm-pagination d-flex">
                                <li class="dm-pagination__item">
                                    <div class="paging-option">
                                        <select name="page-number" class="page-selection" onchange="updatePagination( event )">
                                            <option value="20" {{ 20 == $etudiants->perPage() ? 'selected' : '' }}>20/page</option>
                                            <option value="40" {{ 40 == $etudiants->perPage() ? 'selected' : '' }}>40/page</option>
                                            <option value="60" {{ 60 == $etudiants->perPage() ? 'selected' : '' }}>60/page</option>
                                        </select>
                                        <a href="/pagination-per-page/20" class="d-none per-page-pagination"></a>
                                    </div>
                                </li>
                            </ul>

                            <script>
                                function updatePagination( event ) {
                                    var per_page = event.target.value;

                                    const per_page_link = document.querySelector( '.per-page-pagination' );
                                    per_page_link.setAttribute( 'href', '/pagination-per-page/' + per_page  );

                                    per_page_link.click();
                                }



                                <div class="form-group mb-25">
                                    <label for="email" class="color-dark fs-14 fw-500 align-center">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control ih-medium ip-gray radius-xs b-light px-15" name="email" id="email" value="{{ $etudiants->user->name }}" placeholder="Email Address">
                                    @if($errors->has('email'))
                                        <p class="text-danger">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                                <div class="form-group mb-25">
                                    <label for="phone" class="color-dark fs-14 fw-500 align-center">Phone <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control ih-medium ip-gray radius-xs b-light px-15" name="phone" value="{{ $etudiants->phone }}" id="phone" placeholder="Phone">
                                    @if($errors->has('phone'))
                                        <p class="text-danger">{{ $errors->first('phone') }}</p>
                                    @endif
                                </div>
                                <div class="form-group mb-25">
                                    <label for="profession" class="color-dark fs-14 fw-500 align-center">Profession <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" name="profession" id="profession" value="{{ $etudiants->profession }}" placeholder="Profession">
                                    @if($errors->has('profession'))
                                        <p class="text-danger">{{ $errors->first('profession') }}</p>
                                    @endif
                                </div>
                                <div class="form-group mb-25">
                                    <label for="gender" class="color-dark fs-14 fw-500 align-center">Gender <span class="text-danger">*</span></label>
                                    <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="gender" id="gender">
                                        <option value="">Choose Gender</option>
                                        <option value="male" {{ $etudiants->gender == 'male' ? 'selected':'' }}>Male</option>
                                        <option value="female" {{ $etudiants->gender == 'female' ? 'selected':'' }}>Female</option>
                                    </select>
                                    @if($errors->has('gender'))
                                        <p class="text-danger">{{ $errors->first('gender') }}</p>
                                    @endif
                                </div>
                                <div class="form-group mb-25">
                                    <label for="address" class="color-dark fs-14 fw-500 align-center">Address</label>
                                    <textarea class="form-control ih-medium ip-gray radius-xs b-light px-15" name="address" style="height: 175px;" id="address" placeholder="Address">{{ $etudiants->address }}</textarea>
                                </div>
                                <div class="form-group mb-25">
                                    <label for="gender" class="color-dark fs-14 fw-500 align-center">Status<span
                                        class="text-danger">*</span></label>
                                    <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="status" id="status">
                                        @foreach ( get_status_meta() as $status_key => $status_meta )
                                            <option value="{{ $status_key }}" {{ $etudiants->status == $status_key ? 'selected' : '' }}>
                                                {{ $status_meta['label'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('status'))
                                        <p class="text-danger">{{ $errors->first('status') }}</p>
                                    @endif
                                </div>