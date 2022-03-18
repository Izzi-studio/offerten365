@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="alert alert-custom alert-white alert-shadow fade show gutter-b">
                <h1>{{__('admin/admin.form.edit')}} "{{$customPage->name}}"</h1>
            </div>
            <div class="card card-custom card-stretch gutter-b">
                <div class="card-body pt-2 pb-0 mt-n3">
                    <p></p>
                    <br/>


                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li class="nav-item" role="presentation">
                                <a class="nav-link @if($loop->index == 0) active @endif" id="blog-{{ $localeCode }}"
                                   data-toggle="tab" href="#{{ $localeCode }}" role="tab"
                                   aria-controls="blog-{{ $localeCode }}" aria-selected="true">{{$properties['native']}}</a>
                            </li>
                        @endforeach
                    </ul>
                    <form action="{{route('custom-page.update',$customPage->id)}}" method="POST" enctype="multipart/form-data">
                        <div class="tab-content mt-5" id="myTabContent">
                            @csrf
                            <input type="hidden" name="type" value="custom_page"/>
                            <input type="hidden" name="_method" value="PUT"/>
                            <div class="form-group">
                                <label>
                                    {{__('admin/admin.form.name')}}:
                                </label>
                                <input required="required" class="form-control" type="text" name="name" value="{{ $customPage->name}}"/>
                                @error('name')
                                <div id="toast-container" class="toast-bottom-right">
                                    <div class="toast toast-error" aria-live="polite" style="">
                                        <div class="toast-message">{{$message}}</div>
                                    </div>
                                </div>
                                @enderror
                            </div>

							<div class="form-group">
								<label>Show in front page:</label>
								<div class="radio-inline">
									<label class="radio">
										<input type="radio"
											   name="show_front" value="0"
											   @if ($customPage->show_front == 0) checked @endif/>
										<span></span>
										{{__('admin/admin.form.no')}}
									</label>
									<label class="radio">
										<input type="radio"
											   name="show_front" value="1"
											   @if ($customPage->show_front == 1) checked @endif/>
										<span></span>
										{{__('admin/admin.form.yes')}}
									</label>
								</div>
							</div>
							
                            <div class="form-group">
                                <label>
                                    {{__('admin/admin.form.alias')}}:
                                </label>
                                <input required="required" class="form-control" type="text" name="slug" value="{{ $customPage->slug}}"/>
                                @error('slug')
                                <div id="toast-container" class="toast-bottom-right">
                                    <div class="toast toast-error" aria-live="polite" style="">
                                        <div class="toast-message">{{$message}}</div>
                                    </div>
                                </div>
                                @enderror
                            </div>
							<div class="form-group">
                                <label>
                                    Kategorie:
                                </label>
                                <select class="form-control" name="type_job_id">
										<option value="" >--Select--</option>
										<option value="1" @if($customPage->type_job_id == 1) selected @endif>Umzug</option>
										<option value="2" @if($customPage->type_job_id == 2) selected @endif>Reinigung</option>
										<option value="3" @if($customPage->type_job_id == 3) selected @endif>Umzug+Reinigung</option>
										<option value="4" @if($customPage->type_job_id == 4) selected @endif>Malerarbeiten</option>
                                </select>
                            </div>
							


							 @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <div class="tab-pane fade @if($loop->index == 0) show active @endif"
                                     id="{{ $localeCode }}" role="tabpanel" aria-labelledby="blog-{{ $localeCode }}">
                                    
									<div>
									<h3> BLOCK 1</h3>
									<div class="form-group">
										<label>
											Image BG:
										</label>
										<div class="row">
											<div class="col-2" id="noimg" @if(!$customPage->getCustomPageDescriptionByLocale($localeCode)->b1_image) style="display: none" @endif>
												<img id="previmg" @if($customPage->getCustomPageDescriptionByLocale($localeCode)->b1_image) src="{{env('FRONT_PATH_CUSTOMPAGE_IMAGE')}}{{ $customPage->getCustomPageDescriptionByLocale($localeCode)->b1_image}}" @endif>
												<br />
												<br />
											</div>
											<div class="col-10">
												<div></div>
												<div class="custom-file" id="customfile">
													<input class="custom-file-input" type="file" id="image_input" name="custom_page[{{ $localeCode }}][b1_image]"/>
													<label class="custom-file-label" for="customfile">{{__('admin/admin.form.choose-file')}}</label>
												</div>
											</div>
										</div>
									</div>									

                                    <div class="form-group">
                                        <label>
                                            Text:
                                        </label>
                                        <textarea class="summernote" name="custom_page[{{ $localeCode }}][b1_text]">
                                            @if(isset($customPage->getCustomPageDescriptionByLocale($localeCode)->b1_text)){{$customPage->getCustomPageDescriptionByLocale($localeCode)->b1_text}}@endif
                                        </textarea>
                                    </div>
									
						
									<div class="form-group">
                                        <label>
                                           Text Btn:
                                        </label>
                                        <input required="required" class="form-control" type="text" name="custom_page[{{ $localeCode }}][b1_btn]"
                                                 value="@if(isset($customPage->getCustomPageDescriptionByLocale($localeCode)->b1_btn)){{$customPage->getCustomPageDescriptionByLocale($localeCode)->b1_btn}}@endif"/>
                                    </div>
								</div>
								<hr style="border-top: 2px solid rgb(0 0 0)">
									
								<div>
									<h3> BLOCK 2</h3>	
                                    <div class="form-group">
                                        <label>
                                            Title:
                                        </label>
                                        <textarea class="summernote" name="custom_page[{{ $localeCode }}][b2_title]">
                                            @if(isset($customPage->getCustomPageDescriptionByLocale($localeCode)->b2_title)){{$customPage->getCustomPageDescriptionByLocale($localeCode)->b2_title}}@endif
                                        </textarea>
                                    </div>

									<div class="form-group">
                                        <label>
                                            Content:
                                        </label>
                                        <textarea class="summernote" name="custom_page[{{ $localeCode }}][b2_content]">
                                            @if(isset($customPage->getCustomPageDescriptionByLocale($localeCode)->b2_content)){{$customPage->getCustomPageDescriptionByLocale($localeCode)->b2_content}}@endif
                                        </textarea>
                                    </div>									
								</div>
								<hr style="border-top: 2px solid rgb(0 0 0)">
									
								<div>
									<h3> BLOCK 3</h3>
									<div class="form-group">
										<label>
											Image BG:
										</label>
										<div class="row">
											<div class="col-2" id="noimg" @if(!$customPage->getCustomPageDescriptionByLocale($localeCode)->b3_image) style="display: none" @endif>
												<img id="previmg" @if($customPage->getCustomPageDescriptionByLocale($localeCode)->b3_image) src="{{env('FRONT_PATH_CUSTOMPAGE_IMAGE')}}{{ $customPage->getCustomPageDescriptionByLocale($localeCode)->b3_image}}" @endif>
												<br />
												<br />
											</div>
											<div class="col-10">
												<div></div>
												<div class="custom-file" id="customfile">
													<input class="custom-file-input" type="file" id="image_input" name="custom_page[{{ $localeCode }}][b3_image]"/>
													<label class="custom-file-label" for="customfile">{{__('admin/admin.form.choose-file')}}</label>
												</div>
											</div>
										</div>
									</div>									

                                    <div class="form-group">
                                        <label>
                                            Text:
                                        </label>
										<input required="required" class="form-control" type="text" name="custom_page[{{ $localeCode }}][b3_text]"
                                                 value="@if(isset($customPage->getCustomPageDescriptionByLocale($localeCode)->b3_text)){{$customPage->getCustomPageDescriptionByLocale($localeCode)->b3_text}}@endif"/>
                                    </div>
									
						
									<div class="form-group">
                                        <label>
                                           Text Btn:
                                        </label>
                                        <input required="required" class="form-control" type="text" name="custom_page[{{ $localeCode }}][b3_btn]"
                                                 value="@if(isset($customPage->getCustomPageDescriptionByLocale($localeCode)->b3_btn)){{$customPage->getCustomPageDescriptionByLocale($localeCode)->b3_btn}}@endif"/>
                                    </div>
								</div>
								<hr style="border-top: 2px solid rgb(0 0 0)">									
									
								<div>
									<h3> BLOCK 4</h3>
									<div class="form-group">
										<label>
											Image BG:
										</label>
										<div class="row">
											<div class="col-2" id="noimg" @if(!$customPage->getCustomPageDescriptionByLocale($localeCode)->b4_image) style="display: none" @endif>
												<img id="previmg" @if($customPage->getCustomPageDescriptionByLocale($localeCode)->b4_image) src="{{env('FRONT_PATH_CUSTOMPAGE_IMAGE')}}{{ $customPage->getCustomPageDescriptionByLocale($localeCode)->b4_image}}" @endif>
												<br />
												<br />
											</div>
											<div class="col-10">
												<div></div>
												<div class="custom-file" id="customfile">
													<input class="custom-file-input" type="file" id="image_input" name="custom_page[{{ $localeCode }}][b4_image]"/>
													<label class="custom-file-label" for="customfile">{{__('admin/admin.form.choose-file')}}</label>
												</div>
											</div>
										</div>
									</div>									

                                    <div class="form-group">
                                        <label>
                                            Text:
                                        </label>
										<input required="required" class="form-control" type="text" name="custom_page[{{ $localeCode }}][b4_text]"
                                                 value="@if(isset($customPage->getCustomPageDescriptionByLocale($localeCode)->b4_text)){{$customPage->getCustomPageDescriptionByLocale($localeCode)->b4_text}}@endif"/>
                                    </div>
									
						
									<div class="form-group">
                                        <label>
                                           Text Btn:
                                        </label>
                                        <input required="required" class="form-control" type="text" name="custom_page[{{ $localeCode }}][b4_btn]"
                                                 value="@if(isset($customPage->getCustomPageDescriptionByLocale($localeCode)->b4_btn)){{$customPage->getCustomPageDescriptionByLocale($localeCode)->b4_btn}}@endif"/>
                                    </div>
								</div>
								<hr style="border-top: 2px solid rgb(0 0 0)">										


								<div>
									<h3> BLOCK 5</h3>	
                                    <div class="form-group">
                                        <label>
                                            Title:
                                        </label>
												<input required="required" class="form-control" type="text" name="custom_page[{{ $localeCode }}][b5_title]"
                                                 value="@if(isset($customPage->getCustomPageDescriptionByLocale($localeCode)->b5_title)){{$customPage->getCustomPageDescriptionByLocale($localeCode)->b5_title}}@endif"/>
                                    </div>

									<div class="form-group">
                                        <label>
                                            Content:
                                        </label>
                                        <textarea class="summernote" name="custom_page[{{ $localeCode }}][b5_content]">
                                            @if(isset($customPage->getCustomPageDescriptionByLocale($localeCode)->b5_content)){{$customPage->getCustomPageDescriptionByLocale($localeCode)->b5_content}}@endif
                                        </textarea>
                                    </div>									
								</div>
								<hr style="border-top: 2px solid rgb(0 0 0)">


								<div>
									<h3> BLOCK 6</h3>
									<div class="form-group">
										<label>
											Image BG:
										</label>
										<div class="row">
											<div class="col-2" id="noimg" @if(!$customPage->getCustomPageDescriptionByLocale($localeCode)->b6_image) style="display: none" @endif>
												<img id="previmg" @if($customPage->getCustomPageDescriptionByLocale($localeCode)->b6_image) src="{{env('FRONT_PATH_CUSTOMPAGE_IMAGE')}}{{ $customPage->getCustomPageDescriptionByLocale($localeCode)->b6_image}}" @endif>
												<br />
												<br />
											</div>
											<div class="col-10">
												<div></div>
												<div class="custom-file" id="customfile">
													<input class="custom-file-input" type="file" id="image_input" name="custom_page[{{ $localeCode }}][b6_image]"/>
													<label class="custom-file-label" for="customfile">{{__('admin/admin.form.choose-file')}}</label>
												</div>
											</div>
										</div>
									</div>									

                                    <div class="form-group">
                                        <label>
                                            Text:
                                        </label>
										<input required="required" class="form-control" type="text" name="custom_page[{{ $localeCode }}][b6_text]"
                                                 value="@if(isset($customPage->getCustomPageDescriptionByLocale($localeCode)->b6_text)){{$customPage->getCustomPageDescriptionByLocale($localeCode)->b6_text}}@endif"/>
                                    </div>
									
						
									<div class="form-group">
                                        <label>
                                           Text Btn:
                                        </label>
                                        <input required="required" class="form-control" type="text" name="custom_page[{{ $localeCode }}][b6_btn]"
                                                 value="@if(isset($customPage->getCustomPageDescriptionByLocale($localeCode)->b6_btn)){{$customPage->getCustomPageDescriptionByLocale($localeCode)->b6_btn}}@endif"/>
                                    </div>
								</div>
								<hr style="border-top: 2px solid rgb(0 0 0)">		


								<div>
									<h3> BLOCK 7 SEO TEXT</h3>	

									<div class="form-group">
                                        <label>
                                            Content:
                                        </label>
                                        <textarea class="summernote" name="custom_page[{{ $localeCode }}][b7_seo_text]">
                                            @if(isset($customPage->getCustomPageDescriptionByLocale($localeCode)->b7_seo_text)){{$customPage->getCustomPageDescriptionByLocale($localeCode)->b7_seo_text}}@endif
                                        </textarea>
                                    </div>									
								</div>
								<hr style="border-top: 2px solid rgb(0 0 0)">

								<div>
									<h3> BLOCK 8</h3>
									<div class="form-group">
										<label>
											Image BG:
										</label>
										<div class="row">
											<div class="col-2" id="noimg" @if(!$customPage->getCustomPageDescriptionByLocale($localeCode)->b8_image) style="display: none" @endif>
												<img id="previmg" @if($customPage->getCustomPageDescriptionByLocale($localeCode)->b8_image) src="{{env('FRONT_PATH_CUSTOMPAGE_IMAGE')}}{{ $customPage->getCustomPageDescriptionByLocale($localeCode)->b8_image}}" @endif>
												<br />
												<br />
											</div>
											<div class="col-10">
												<div></div>
												<div class="custom-file" id="customfile">
													<input class="custom-file-input" type="file" id="image_input" name="custom_page[{{ $localeCode }}][b8_image]"/>
													<label class="custom-file-label" for="customfile">{{__('admin/admin.form.choose-file')}}</label>
												</div>
											</div>
										</div>
									</div>									

                                    <div class="form-group">
                                        <label>
                                            Text:
                                        </label>
										<input required="required" class="form-control" type="text" name="custom_page[{{ $localeCode }}][b8_text]"
                                                 value="@if(isset($customPage->getCustomPageDescriptionByLocale($localeCode)->b8_text)){{$customPage->getCustomPageDescriptionByLocale($localeCode)->b8_text}}@endif"/>
                                    </div>
									
						
									<div class="form-group">
                                        <label>
                                           Text Btn:
                                        </label>
                                        <input required="required" class="form-control" type="text" name="custom_page[{{ $localeCode }}][b8_btn]"
                                                 value="@if(isset($customPage->getCustomPageDescriptionByLocale($localeCode)->b8_btn)){{$customPage->getCustomPageDescriptionByLocale($localeCode)->b8_btn}}@endif"/>
                                    </div>
								</div>
								<hr style="border-top: 2px solid rgb(0 0 0)">										
									<!-- seo -->
									<div>
								<h3> SEO META</h3>
                                    <div class="form-group">
                                        <label>
                                            {{__('admin/admin.form.meta-title')}}:
                                        </label>
                                        <input class="form-control" type="text" name="custom_page[{{ $localeCode }}][seo][title]"
                                                       value="@if(isset($customPage->getSeoMetaTagsByLocale($localeCode)->title)){{ $customPage->getSeoMetaTagsByLocale($localeCode)->title}}@endif"/>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            {{__('admin/admin.form.meta-desc')}}:
                                        </label>
                                        <input class="form-control" type="text" name="custom_page[{{ $localeCode }}][seo][description]"
                                                             value="@if(isset($customPage->getSeoMetaTagsByLocale($localeCode)->description)){{$customPage->getSeoMetaTagsByLocale($localeCode)->description}}@endif"/>
                                    </div>
                                </div>
                                </div>
                            @endforeach
                        </div>
                        <input value="{{__('admin/admin.form.submit')}}" type="submit" class="btn btn-success font-weight-bold btn-lg mr-2" />
                    </form>

                </div>
            </div>
        </div>
    </div>
@stop
