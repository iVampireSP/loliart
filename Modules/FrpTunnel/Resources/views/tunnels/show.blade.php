@extends('layouts.app')

@section('app-menu')
    @include('frptunnel::layouts.menu')
@endsection

@section('title', 'New Tunnel')

@section('content')
    <h1 class="mdui-typo-display-1">{{ tr('New Tunnel') }}</h1>

    <div class="mdui-tab" mdui-tab>
        <a href="#infomations" class="mdui-ripple">{{ tr('Information') }}</a>
        <a href="#configuration" class="mdui-ripple">{{ tr('Basic Configuration') }}</a>
        <a href="#delete" class="mdui-ripple">{{ tr('Delete') }}</a>
    </div>

    <div id="configuration">
        <form action="#" id="new" onsubmit="event.preventDefault();m.update($(this))">

            <div class="mdui-row mdui-m-t-4">
                <div class="mdui-col-md-12 mdui-col-sm-12">
                    <div class="mdui-typo-headline">{{ tr('Tunnel Details') }}</div>

                    <div class="mdui-textfield mdui-textfield-floating-label">
                        <label class="mdui-textfield-label">{{ tr('Name') }}</label>
                        <input class="mdui-textfield-input" type="text" name="name" value="{{ $tunnel->name }}" />
                    </div>

                    <div class="mdui-row">
                        <div class="mdui-col-xs-6">
                            <div id="choose-protocol">
                                <div class="mdui-row mdui-p-t-4 mdui-p-l-1 mdui-m-b-2">
                                    <span class="mdui-typo-headline">{{ tr('Protocol') }}</span>
                                    <br />
                                    <select name="protocol" class="mdui-select" id="protocol" required
                                        selected-item="{{ $tunnel->protocol }}">
                                        <option value="http">HTTP</option>
                                        <option value="https">HTTPS</option>
                                        <option value="tcp">TCP</option>
                                        <option value="udp">UDP</option>
                                        <option value="stcp">STCP</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mdui-col-xs-6">
                            <div id="choose-server">
                                <div class="mdui-row mdui-p-t-4 mdui-p-l-1 mdui-m-b-2">
                                    <span class="mdui-typo-headline">{{ tr('Choose Server') }}</span>
                                    <br />
                                    <select name="server_id" class="mdui-select" id="server" required
                                        selected-item="{{ $tunnel->server_id }}">
                                        @foreach ($servers as $server)
                                            <option value="{{ $server->id }}">{{ $server->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mdui-col-sm-12">
                    <div id="choose-addr">
                        <div class="mdui-row mdui-p-t-4">
                            <div class="mdui-col-xs-12">
                                <span class="mdui-typo-headline">{{ tr('Local Network Address') }}</span>
                                <p>{{ tr('The address of the mapped host, such as 127.0 0.1:80') }}</p>
                                <div class="mdui-textfield mdui-textfield-floating-label">
                                    <label class="mdui-textfield-label">{{ tr('Local Network Address') }}</label>
                                    <input class="mdui-textfield-input" type="text" name="local_address"
                                        value="{{ $tunnel->local_address }} " />
                                </div>
                            </div>

                            <div class="mdui-col-xs-12" id="remote-input" style="display: none">
                                <span class="mdui-typo-headline">{{ tr('Public Port') }}</span>
                                <p>{{ tr('The port used for public network access.') }}</p>
                                <div class="mdui-textfield mdui-textfield-floating-label">
                                    <label class="mdui-textfield-label">{{ tr('Public network port') }}</label>
                                    <input class="mdui-textfield-input" type="text" name="remote_port"
                                        value="{{ $tunnel->remote_port }}" />
                                </div>
                            </div>

                            <div class="mdui-col-xs-12" id="domain-input">
                                <span class="mdui-typo-headline">{{ tr('Domain') }}</span>
                                <p>{{ tr('After creation, record this domain name CNAME to the domain name of the corresponding server.') }}<br />
                                </p>
                                <div class="mdui-textfield mdui-textfield-floating-label">
                                    <label class="mdui-textfield-label">{{ tr('Domain') }}</label>
                                    <input class="mdui-textfield-input" type="text" name="custom_domain"
                                        value="{{ $tunnel->custom_domain }}" />
                                </div>
                            </div>

                            <div class="mdui-col-xs-12" id="sk-input" style="display: none">
                                <span class="mdui-typo-headline">STCP {{ tr('secret key') }}</span>
                                <p>{{ tr('Only letters, numbers, dashes (-) and underscores (), at least 3 digits and at most 15 digits are allowed and cannot be modified.') }}
                                </p>
                                <div class="mdui-textfield mdui-textfield-floating-label">
                                    <label class="mdui-textfield-label">STCP {{ tr('secret key') }}</label>
                                    <input class="mdui-textfield-input" type="text" name="sk"
                                        value="{{ $tunnel->sk }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button class="mdui-float-right mdui-m-t-4 mdui-btn mdui-ripple mdui-btn-outlined"
                type="submit">{{ tr('Update Tunnel') }}</button>

        </form>
    </div>

    <div id="delete">
        <button class="mdui-btn mdui-ripple mdui-btn-outlined mdui-m-t-2"
            onclick="event.preventDefault();m.delete()">{{ tr('Delete Tunnel') }}</button>
    </div>


    <script>
        m = {
            update: (ele) => {
                let arr = $(ele).serializeArray();
                util.put(route('frpTunnel.tunnels.update', {{ $tunnel->id }}), arr)
            },
            change: () => {
                let val = $('#protocol').val()
                if (val == 'http' || val == 'https') {
                    $('#sk-input').hide()
                    $('#remote-input').hide()
                    $('#domain-input').show()
                } else if (val == 'tcp' || val == 'udp') {
                    $('#sk-input').hide()
                    $('#domain-input').hide()
                    $('#remote-input').show()
                } else if (val == 'stcp') {
                    $('#remote-input').hide()
                    $('#domain-input').hide()
                    $('#sk-input').show()
                }
            },
            delete: () => {
                util.delete(route('frpTunnel.tunnels.destroy', {{ $tunnel->id }}))
            },
        }

        $(() => {
            let ele = $('#protocol option')
            let selected = $('#protocol').attr('selected-item')
            for (let i = 0; i < ele.length; i++) {
                if ($($('#protocol option')[i]).val() == selected) {
                    $($('#protocol option')[i]).attr('selected', true)
                    ui.mutation()
                    break
                }

            }

            ele = $('#server option')
            selected = $('#server').attr('selected-item')
            for (let i = 0; i < ele.length; i++) {
                if ($($('#server option')[i]).val() == selected) {
                    $($('#server option')[i]).attr('selected', true)
                    ui.mutation()
                    break
                }

            }

            m.change()
        })

        $('#protocol').change(m.change)
    </script>
@endsection
