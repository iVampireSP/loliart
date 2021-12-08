@extends('layouts.app')

@section('title', tr('Edit Node') . ': ' . $node->display_name)

@section('app-menu')
    @include('wings::layouts.menu')
@endsection

@section('content')
    <div class="mdui-typo-display-1">{{ $node->display_name }}</div>

    <div class="mdui-tab" mdui-tab>
        <a href="#node-info" class="mdui-ripple">{{ tr('Node Info') }}</a>
        <a href="#node-config" class="mdui-ripple">{{ tr('Node Configuration') }}</a>
        {{-- <a href="#example1-tab3" class="mdui-ripple">images</a> --}}
    </div>

    <div class="mdui-row mdui-m-t-5" id="node-info">
        <button class="mdui-btn mdui-btn-icon mdui-float-right" style="z-index: 1;" onclick="util.toggleLock('node-edit')"
            data-lock-btn="node-edit" mdui-tooltip="{content: '{{ tr('切换锁定') }}', position: 'left'}">
            <i class="mdui-icon material-icons">lock</i>
        </button>
        <form action="#" id="new" data-lock-form="node-edit"
            onsubmit="event.preventDefault();util.wings.locations.nodes.edit($(this))">
            <div class="mdui-col-md-6 mdui-col-sm-12">
                <div class="mdui-typo-headline">{{ tr('Basic Details') }}</div>

                <div class="mdui-textfield">
                    <label class="mdui-textfield-label">{{ tr('Node Name') }}</label>
                    <input class="mdui-textfield-input" type="text" name="name" value="{{ $node->display_name }}" />
                    <div class="mdui-textfield-helper">{{ tr('Your node need a name.') }}</div>
                </div>

                <div class="mdui-typo-subheading mdui-m-t-2">{{ tr('Where is your new node?') }}</div>
                <select class="mdui-select" name="location_id" mdui-select>
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                    @endforeach
                </select>

                <div class="mdui-typo-subheading mdui-m-t-2">{{ tr('Node Visibility') }}</div>
                <p>{{ tr('If checked, the node will be visible.') }}</p>
                <label class="mdui-switch">
                    <input type="checkbox" name="visibility" value="1" @if ($node->visibility) checked @endif />
                    <i class="mdui-switch-icon"></i>
                </label>

                <div class="mdui-textfield">
                    <label class="mdui-textfield-label">{{ tr('FQDN') }}</label>
                    <input class="mdui-textfield-input" type="text" name="fqdn" value="{{ $node->fqdn }}" />
                    <div class="mdui-textfield-helper">
                        {{ tr('Please enter domain name (e.g node.example.com) to be used for connecting to the daemon.') }}
                    </div>
                </div>

                <div class="mdui-typo-subheading mdui-m-t-2">{{ tr('Behind Proxy') }}</div>
                <p>{{ tr('If you are running the daemon behind a proxy such as Cloudflare, checked this to have the daemon skip looking for certificates on boot.') }}
                </p>
                <label class="mdui-switch">
                    <input type="checkbox" name="behind_proxy" value="1" @if ($node->behind_proxy) checked @endif />
                    <i class="mdui-switch-icon"></i>
                </label>

                <div class="mdui-typo-subheading mdui-m-t-2">{{ tr('Maintenance Mode') }}</div>
                <p>{{ tr('If the node is marked as \'Under Maintenance\' users won\'t be able to access servers that are on this node.') }}
                </p>
                <label class="mdui-switch">
                    <input type="checkbox" name="maintenance_mode" value="1" @if ($node->maintenance_mode) checked @endif />
                    <i class="mdui-switch-icon"></i>
                </label>


            </div>

            <div class="mdui-col-md-6 mdui-col-sm-12">
                <div class="mdui-typo-headline">{{ tr('Configuration') }}</div>
                <div class="mdui-row">
                    <div class="mdui-col-md-6 mdui-col-sm-6">
                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label">{{ tr('Daemon Server File Directory') }}</label>
                            <input class="mdui-textfield-input" type="text" name="daemon_base"
                                value="{{ $node->daemon_base }}" />
                        </div>
                        <div class="mdui-typo-caption-opacity">
                            {{ tr('Enter the directory where server files should be stored. If you use OVH you should check your partition scheme. You may need to use /home/daemon-data to have enough space.') }}
                        </div>
                        <div class="mdui-typo-caption-opacity mdui-m-t-3">
                            {{ tr('Enter the total amount of memory available for new servers. If you would like to allow overallocation of memory enter the percentage that you want to allow. To disable checking for overallocation enter -1 into the field. Entering 0 will prevent creating new servers if it would put the node over the limit.') }}
                        </div>

                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label">{{ tr('Total Disk Space') }}</label>
                            <input class="mdui-textfield-input" type="text" name="disk" value="{{ $node->disk }}" />
                            <div class="mdui-textfield-helper">{{ tr('Unit: MB') }}
                            </div>
                        </div>

                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label">{{ tr('Daemon Port') }}</label>
                            <input class="mdui-textfield-input" type="text" name="daemon_listen"
                                value="{{ $node->daemon_listen }}" />
                            <div class="mdui-textfield-helper">{{ tr('Unit: %') }}
                            </div>
                        </div>

                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label">{{ tr('Daemon SFTP Port') }}</label>
                            <input class="mdui-textfield-input" type="text" name="daemon_sftp"
                                value="{{ $node->daemon_sftp }}" />
                        </div>

                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label">{{ tr('Maximum Web Upload Filesize') }}</label>
                            <input class="mdui-textfield-input" type="text" name="upload_size"
                                value="{{ $node->upload_size }}" />
                            <div class="mdui-textfield-helper">{{ tr('Unit: MB') }}
                            </div>
                        </div>

                    </div>

                    <div class="mdui-col-md-6 mdui-col-sm-6">
                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label">{{ tr('Total Memory') }}</label>
                            <input class="mdui-textfield-input" type="text" name="memory" value="{{ $node->memory }}" />
                            <div class="mdui-textfield-helper">{{ tr('Unit: MB') }}
                            </div>
                        </div>

                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label">{{ tr('Memory Over-Allocation') }}</label>
                            <input class="mdui-textfield-input" type="text" name="memory_overallocate"
                                value="{{ $node->memory_overallocate }}" />
                            <div class="mdui-textfield-helper">{{ tr('Unit: %') }}
                            </div>
                        </div>

                        <div class="mdui-textfield">
                            <label class="mdui-textfield-label">{{ tr('Disk Over-Allocation') }}</label>
                            <input class="mdui-textfield-input" type="text" name="disk_overallocate"
                                value="{{ $node->disk_overallocate }}" />
                            <div class="mdui-textfield-helper">{{ tr('Unit: %') }}
                            </div>
                        </div>

                        <div class="mdui-typo-caption-opacity mdui-m-t-3">
                            {{ tr('Enter the total amount of disk space available for new servers. If you would like to allow overallocation of disk space enter the percentage that you want to allow. To disable checking for overallocation enter -1 into the field. Entering 0 will prevent creating new servers if it would put the node over the limit.') }}
                        </div>
                        <div class="mdui-typo-caption-opacity mdui-m-t-3">
                            {{ tr('The daemon runs its own SFTP management container and does not use the SSHd process on the main physical server. Do not use the same port that you have assigned for your physical server\'s SSH process. If you will be running the daemon behind CloudFlare® you should set the daemon port to 8443 to allow websocket proxying over SSL.') }}
                        </div>

                        <button class="mdui-m-t-4 mdui-btn mdui-ripple mdui-btn-outlined"
                            type="submit">{{ tr('Update Node') }}</button>

                    </div>
                </div>
            </div>
        </form>
        <script>
            $(() => {
                util.toggleLock('node-edit')
            })
        </script>

    </div>

    <div id="node-config" class="mdui-m-t-5">
        <div class="mdui-typo-headline">{{ tr('Configuration File') }}</div>
        <p>{{ tr('This file should be placed in your daemon\'s root directory (usually /etc/pterodactyl) in a file called config.yml.') }}
        </p>

        <div class="mdui-typo">
            <pre>{!! $node_configuration !!}</pre>
        </div>
    </div>



@endsection
