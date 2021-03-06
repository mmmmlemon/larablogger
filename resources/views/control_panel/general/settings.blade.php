<div id="settings_content" class="current-content">   
    <div class="columns">
        <div class="column is-12">
            <div class="has-text-centered">
                <span class="icon">
                    <i class="fas fa-cog"></i>
                </span>
                <h3 class="subtitle">Web-site general settings</h3>
            </div>

            <br>

            <form action="control/update_settings" method="POST" id="general_form">
                @csrf
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Site title</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded">
                                <input class="input" id="site_title" @error('site_title') is-danger @enderror name="site_title" type="text" 
                                    required placeholder="Web-site name" maxlength="55" 
                                    value="@if($errors->any()){{old('site_title')}}@else{{$settings->site_title}}@endif">
                            </p>
                            @error('site_title')
                                <p class="help is-danger"><b> {{ $message }}</b></p>  
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Site subtitle</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded">
                                <input class="input @error('site_subtitle') is-danger @enderror" name="site_subtitle" 
                                    type="text" required placeholder="Subtitle" id="site_subtitle" maxlength="55"
                                    value="@if($errors->any()){{old('site_subtitle')}}@else{{$settings->site_subtitle}}@endif">
                            </p>
                            @error('site_subtitle')
                                <p class="help is-danger"><b> {{ $message }}</b></p>  
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Contact E-Mail</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded">
                                <input class="input @error('contact_email') is-danger @enderror" name="contact_email" 
                                type="text" required placeholder="to@example.com" maxlength="30"
                                value="@if($errors->any()){{old('contact_email')}}@else{{$settings->contact_email}}@endif">
                            </p>
                            @error('contact_email')
                                <p class="help is-danger"><b> {{ $message }}</b></p>  
                            @enderror
                        </div>
                    </div>
                </div>

                
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Sender E-Mail</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded">
                                <input class="input @error('from_email') is-danger @enderror" name="from_email" 
                                type="text" required placeholder="from@example.com" maxlength="30"
                                value="@if($errors->any()){{old('from_email')}}@else{{$settings->from_email}}@endif">
                            </p>
                            @error('from_email')
                                <p class="help is-danger"><b> {{ $message }}</b></p>  
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Contact text</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded">
                                <input class="input @error('contact_text') is-danger @enderror" id="contact_disclaimer" name="contact_text" 
                                    type="text" placeholder="Disclaimer for your contact form" maxlength="200"
                                    value="@if($errors->any()){{old('contact_text')}}@else{{$settings->contact_text}}@endif">
                            </p>
                            @error('contact_text')
                                <p class="help is-danger"><b> {{ $message }}</b></p>  
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label">
               
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <button type="submit" class="button is-link" id="save_general">
                                    <span class="icon">
                                        <i class="fas fa-save"></i>
                                    </span>
                                    <span>Save</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="columns">
        <div class="column is-12 has-text-centered">
            <span class="icon">
                <i class="fas fa-link"></i>
            </span>
            <h3 class="subtitle">Social media (Links)</h3>
            <form id="form_social" action="control/update_social" method="POST">
                @csrf 
                
                {{-- №1 --}}
                <div class="field is-horizontal" id="soc-media-field-0">
                    <div class="field-label is-normal">
                        <label class="label">#1</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <input class="input invisible" type="text" name="id_0" value="{{$social_media[0]->id}}">
                            <input class="input" type="text" placeholder="Web-site (or social media platform) name" 
                                name="platform_0" maxlength="20" value="{{$social_media[0]->platform_name}}">
                            @error('platform_0')
                                <p class="help is-danger"><b> {{ $message }}</b></p>  
                            @enderror
                        </div>
                        <div class="field">
                            <input class="input" type="text" placeholder="https://web-site.com" name="url_0" 
                                value="{{$social_media[0]->url}}">
                            @error('url_0')
                                <p class="help is-danger"><b> {{ $message }}</b></p>  
                            @enderror
                        </div> 
                    </div>
                </div>

                <!-- №2 -->
                <div class="field is-horizontal" id="soc-media-field-0">
                    <div class="field-label is-normal">
                        <label class="label">#2</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <input class="input invisible" type="text" name="id_1" value="{{$social_media[1]->id}}">
                            <input class="input" type="text" placeholder="Web-site (or social media platform) name" 
                                name="platform_1" maxlength="20" value="{{$social_media[1]->platform_name}}">
                            @error('platform_1')
                                <p class="help is-danger"><b> {{ $message }}</b></p>  
                            @enderror
                        </div>
                        <div class="field">
                            <input class="input" type="url" placeholder="https://web-site.com" name="url_1" 
                                value="{{$social_media[1]->url}}">
                            @error('url_1')
                                <p class="help is-danger"><b> {{ $message }}</b></p>  
                            @enderror
                        </div>    
                    </div>
                </div>

                <!--№3 -->
                <div class="field is-horizontal" id="soc-media-field-0">
                    <div class="field-label is-normal">
                        <label class="label">#3</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <input class="input invisible" type="text" name="id_2" value="{{$social_media[2]->id}}">
                            <input class="input" type="text" placeholder="Web-site (or social media platform) name" 
                                name="platform_2" maxlength="20" value="{{$social_media[2]->platform_name}}">
                            @error('platform_2')
                                <p class="help is-danger"><b> {{ $message }}</b></p>  
                            @enderror
                        </div>
                        <div class="field">
                            <input class="input" type="url" placeholder="https://web-site.com" name="url_2" 
                                value="{{$social_media[2]->url}}">
                            @error('url_2')
                                <p class="help is-danger"><b> {{ $message }}</b></p>  
                            @enderror
                        </div>       
                    </div>
                </div>

                <!-- №4 -->
                <div class="field is-horizontal" id="soc-media-field-0">
                    <div class="field-label is-normal">
                        <label class="label">#4</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <input class="input invisible" type="text" name="id_3" value="{{$social_media[3]->id}}">
                            <input class="input" type="text" placeholder="Web-site (or social media platform) name" 
                                name="platform_3" maxlength="20" value="{{$social_media[3]->platform_name}}">
                            @error('platform_3')
                                <p class="help is-danger"><b> {{ $message }}</b></p>  
                            @enderror
                        </div>
                        <div class="field">
                            <input class="input" type="url" placeholder="https://web-site.com" name="url_3" 
                                value="{{$social_media[3]->url}}">
                            @error('url_3')
                                <p class="help is-danger"><b> {{ $message }}</b></p>  
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label">

                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <button type="submit" class="button is-link" id="save_social">
                                    <span class="icon">
                                        <i class="fas fa-save"></i>
                                    </span>
                                    <span>Save</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
