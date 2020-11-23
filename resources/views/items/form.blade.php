    <div class="card">
        <header class="card__header">
            <div class="card__title">{{ __('app.apps.add_application') }}</div>
            <div class="spacer"></div>
            <div class="card__actions">
                <div class="toggleinput">
                    <label class="name">{{ __('app.apps.pinned') }}</label>
                    {!! Form::hidden('pinned', '0') !!}
                    <label class="switch">
                        <?php
                        $checked = false;
                        if (isset($item->pinned) && (bool)$item->pinned === true) $checked = true;
                        $set_checked = ($checked) ? ' checked="checked"' : '';
                        ?>
                        <input type="checkbox" name="pinned" value="1" <?php echo $set_checked; ?> />
                        <span class="slider round"></span>
                    </label>
                </div>
                <button type="submit" class="card__action"><i class="fa fa-save"></i><span>{{ __('app.buttons.save') }}</span></button>
                <a href="{{ route('items.index', []) }}" class="card__action"><i class="fa fa-ban"></i><span>{{ __('app.buttons.cancel') }}</span></a>
            </div>
        </header>
        <div class="card__body card__body--flush">
            <div id="create" class="create">
                {!! csrf_field() !!}
                <div class="input">
                    <label>{{ __('app.apps.application_name') }} *</label>
                    {!! Form::text('title', null, array('placeholder' => __('app.apps.title'), 'id' => 'appname', 'class' => 'form-control')) !!}
                </div>
                <div class="input">
                    <label>{{ __('app.apps.apptype') }} *</label>
                    {!! Form::select('class', App\Application::applist(), null, array('class' => 'form-control config-item', 'id' => 'apptype', 'data-config' => 'type')) !!}
                </div>

                <div class="input">
                    <label>{{ __('app.apps.colour') }} *</label>
                    {!! Form::text('colour', null, array('placeholder' => __('app.apps.hex'), 'id' => 'appcolour', 'class' => 'form-control color-picker set-bg-elem')) !!}
                </div>

                <div class="input">
                    <label>{{ strtoupper(__('app.url')) }}</label>
                    {!! Form::text('url', null, array('placeholder' => __('app.url'), 'id' => 'appurl', 'class' => 'form-control')) !!}
                </div>

                <div class="input">
                    <label>{{ __('app.apps.tags') }} ({{ __('app.optional') }})</label>
                    {!! Form::select('tags[]', $tags, $current_tags, ['class' => 'tags', 'multiple']) !!}
                </div>

                <div class="input">
                    <div class="icon-container">
                        <div id="appimage">
                            @if(isset($item->icon) && !empty($item->icon) || old('icon'))
                            <?php
                            if (isset($item->icon)) $icon = $item->icon;
                            else $icon = old('icon');
                            ?>
                            <img src="{{ asset('storage/'.$icon) }}" />
                            {!! Form::hidden('icon', $icon, ['class' => 'form-control']) !!}
                            @else
                            <img src="{{ asset('/img/heimdall-icon-small.png') }}" />
                            @endif
                        </div>
                        <div class="upload-button-wrapper">
                            <button class="button button--primary">{{ __('app.buttons.upload')}} </button>
                            <input type="file" id="upload" name="file" />
                        </div>
                    </div>
                </div>



                <div class="newblock" style="display: block;">
                    <h2>Preview</h2>
                </div>


                <div id="tile-preview" class="input">
                    @include('items.preview')
                </div>




                @if(isset($item) && $item->enhanced())

                <div id="sapconfig" style="display: block;">
                    @if(isset($item))
                    @include('SupportedApps::'.$item->getconfig()->name.'.config')
                    @endif
                </div>

                @elseif(old('class') && App\Item::isEnhanced(old('class')))

                <div id="sapconfig" style="display: block;">
                    @include('SupportedApps::'.App\Item::nameFromClass(old('class')).'.config')
                </div>

                @else

                <div id="sapconfig"></div>

                @endif

            </div>
        </div>
        <footer class="card__footer">
            <div class="spacer"></div>
            <div class="card__actions">
                <button type="submit" class="card__action"><i class="fa fa-save"></i><span>{{ __('app.buttons.save') }}</span></button>
                <a href="{{ route('items.index', []) }}" class="card__action"><i class="fa fa-ban"></i><span>{{ __('app.buttons.cancel') }}</span></a>
            </div>
        </footer>

    </div>