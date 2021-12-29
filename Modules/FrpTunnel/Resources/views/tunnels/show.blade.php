@extends('layouts.app')

@section('app-menu')
    @include('frptunnel::layouts.menu')
@endsection

@section('title', $tunnel->name)

@section('content')
    <h1 class="mdui-typo-display-1">{{ $tunnel->name }}</h1>

    <div class="mdui-tab" mdui-tab>
        <a href="#infomations" class="mdui-ripple">{{ tr('Information') }}</a>
        <a href="#configuration" class="mdui-ripple">{{ tr('Basic Configuration') }}</a>
        <a href="#configure-file" class="mdui-ripple">{{ tr('Configure file') }}</a>
        <a href="#delete" class="mdui-ripple">{{ tr('Delete') }}</a>
    </div>

    <div id="infomations" class="tunnel">
        @php($cache = Cache::get('frpTunnel_data_' . $tunnel->client_token, []))
        @if (!empty($cache))
            <div class="mdui-typo-headline mdui-m-t-2">{{ tr('Server Details') }}</div>
            <div class="mdui-table-fluid mdui-m-t-2">
                <table class="mdui-table mdui-table-hoverable">
                    <tbody class="mdui-typo">
                        <tr>
                            <td>{{ tr('Status') }}</td>
                            <td>{{ $cache['status'] ?? tr('Wait refresh') }}</td>
                        </tr>

                        <tr>
                            <td>{{ tr('Download') }}</td>
                            <td>{{ unitConversion($cache['today_traffic_in'] ?? 0) }}</td>
                        </tr>

                        <tr>
                            <td>{{ tr('Upload') }}</td>
                            <td>{{ unitConversion($cache['today_traffic_out'] ?? 0) }}</td>
                        </tr>

                        <tr>
                            <td>{{ tr('Connections') }}</td>
                            <td>{{ $cache['cur_conns'] ?? 0 }}</td>
                        </tr>

                        <tr>
                            <td>{{ tr('Last start time') }}</td>
                            <td>{{ $cache['last_start_time'] ?? tr('Wait refresh') }}</td>
                        </tr>

                        <tr>
                            <td>{{ tr('Last close time') }}</td>
                            <td>{{ $cache['last_close_time'] ?? tr('Wait refresh') }}</td>
                        </tr>

                        <tr>
                            <td>{{ tr('Type') }}</td>
                            <td>{{ $cache['type'] ?? tr('Wait refresh') }}</td>
                        </tr>

                        <tr>
                            <td>{{ tr('Use Encryption') }}</td>
                            <td>{{ $cache['use_encryption'] ?? tr('Wait refresh') }}</td>
                        </tr>

                        <tr>
                            <td>{{ tr('Use compression') }}</td>
                            <td>{{ $cache['use_compression'] ?? tr('Wait refresh') }}</td>
                        </tr>

                        <tr>
                            <td>{{ tr('Proxy Protocol Version') }}</td>
                            <td>{{ $cache['proxy_protocol_version'] ?? tr('Wait refresh') }}</td>
                        </tr>

                        <tr>
                            <td>{{ tr('Bandwidth limit') }}</td>
                            <td>{{ $cache['bandwidth_limit'] ?? tr('Wait refresh') }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        @else
            <p>{{ tr('Tunnel is offline.') }}</p>
        @endif
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
                        <div class="mdui-col-xs-4">
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
                        <div class="mdui-col-xs-4">
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

                        <div class="mdui-col-xs-4">
                            <div id="reset-token">
                                <div class="mdui-row mdui-p-t-4 mdui-p-l-1 mdui-m-b-2">
                                    <span class="mdui-typo-headline">{{ tr('Reset token') }}</span>
                                    <br />
                                    <div class="mdui-col">
                                        <label class="mdui-checkbox"
                                            mdui-tooltip="{content: 'If your tunnel configuration\'s name has been leaked, it may be useful to check this. When you check and submit, the client using the tunnel will be forced to offline, and you must also apply for a new tunnel profile.', position: 'right'}">
                                            <input type="checkbox" id="reset_token" name="reset_token" value="1" />
                                            <i class="mdui-checkbox-icon"></i>
                                            {{ tr('Reset tunnel token.') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mdui-col-sm-12">
                    <div id="choose-addr">
                        <div class="mdui-row mdui-p-t-4">
                            <div class="mdui-col-xs-12 mdui-p-b-3">
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

    <div id="configure-file">
        <div class="mdui-textfield">
            <textarea readonly class="mdui-textfield-input" id="frp-configure-file"></textarea>
            <div class="mdui-textfield-helper">{{ tr('This field should be security sensitive, Please use ') }} <kbd>Ctrl
                    + C {{ tr('to copy the configuration.') }}</kbd></div>
        </div>
    </div>

    <script>
        m = {
            update: (ele) => {
                let arr = $(ele).serializeArray();
                util.put(route('frpTunnel.tunnels.update', {{ $tunnel->id }}), arr);
                $('#reset_token').prop('checked', 0)
                setTimeout(() => {
                    util.reload('.reload-config')
                }, 500)
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
            e: (type, data) => {
                switch (type) {
                    case 'frpServer.tunnels.updated':
                        util.reload('.tunnel')

                        break;
                }
            },
            tunnel_config: {},
            delete: () => {
                util.delete(route('frpTunnel.tunnels.destroy', {{ $tunnel->id }}))
            },
            put_config: () => {
                let local_addr = m.tunnel_config.local_address.split(':')
                let config = `[common]
server_addr = ${m.tunnel_config.server.server_address}
server_port = ${m.tunnel_config.server.server_port}
token = ${m.tunnel_config.server.token}

# Team ${m.tunnel_config.team.name}'s ${m.tunnel_config.name} at server ${m.tunnel_config.server.name}
[${m.tunnel_config.client_token}]
type = ${m.tunnel_config.protocol}
local_ip = ${local_addr[0]}
local_port = ${local_addr[1]}
`;

                if (m.tunnel_config.protocol == 'tcp' || m.tunnel_config.protocol == 'udp') {
                    config += `remote_port = ${m.tunnel_config.remote_port}

`;
                } else if (m.tunnel_config.protocol == 'http' || m.tunnel_config.protocol == 'https') {
                    config += `custom_domains = ${m.tunnel_config.custom_domain}
`;
                } else if (m.tunnel_config.protocol == 'stcp') {
                    let random = Math.floor(Math.random() * 50);
                    config += `sk = ${m.tunnel_config.sk}

#------ Visitor config file --------
[common]
server_addr = ${m.tunnel_config.server.server_address}
server_port = ${m.tunnel_config.server.server_port}
user = client
token = ${m.tunnel_config.server.token}

[client_visitor_${random}]
type = stcp
role = visitor
server_name = ${m.tunnel_config.client_token}
sk = ${m.tunnel_config.sk}
bind_addr = 127.0.0.1
bind_port = ${local_addr[1]}

#------ Visitor config file --------
`
                }

                $('#frp-configure-file').val(config)
            }
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


    <div class="reload-config">
        <script>
            m.tunnel_config = {!! $tunnel !!}
            m.put_config()
        </script>
    </div>
@endsection
