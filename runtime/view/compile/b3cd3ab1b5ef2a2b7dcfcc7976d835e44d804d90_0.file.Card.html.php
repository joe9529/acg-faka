<?php
/* Smarty version 3.1.46, created on 2023-08-07 22:18:54
  from '/www/wwwroot/acg-faka/app/View/Admin/Trade/Card.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_64d0fd4e2af846_09011708',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b3cd3ab1b5ef2a2b7dcfcc7976d835e44d804d90' => 
    array (
      0 => '/www/wwwroot/acg-faka/app/View/Admin/Trade/Card.html',
      1 => 1691417695,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../Header.html' => 1,
    'file:../Toolbar.html' => 1,
    'file:../Footer.html' => 1,
  ),
),false)) {
function content_64d0fd4e2af846_09011708 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../Header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<style>
    .layui-layer-page .layui-layer-content {
        position: relative !important;
        overflow: auto !important;
    }
</style>
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <?php $_smarty_tpl->_subTemplateRender("file:../Toolbar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            <!--begin::Tables Widget 9-->
            <div class="card mb-5 mb-xl-8">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <div class="card-toolbar">
                        <button class="btn btn-sm btn-light-primary btn-app-create me-3"><i class="fas fa-plus"></i>
                            上传卡密
                        </button>
                        <button class="btn btn-sm btn-light-danger btn-app-del me-3"><i class="fas fa-trash"></i> 移除选中卡密
                        </button>
                        <button class="btn btn-sm btn-light-dark btn-app-lock me-3"><i class="fa fa-lock"></i> 锁定选中卡密
                        </button>
                        <button class="btn btn-sm btn-light-success btn-app-unlock me-3"><i class="fa fa-lock-open"></i>
                            解锁选中卡密
                        </button>
                        <button class="btn btn-sm btn-light-success btn-app-sell me-3"><i class="fa fa-marker"></i>
                            至已出售选中卡密
                        </button>
                        <button class="btn btn-sm btn-light-primary btn-app-export me-3"><i
                                    class="fas fa-file-export"></i>
                            导出筛选卡密
                        </button>
                    </div>
                </div>
                <!--end::Header-->

                <div class="card-body py-3">
                    <form class="search-query"></form>
                    <table id="trade-card" lay-filter="trade-card"></table>
                </div>
            </div>

            <!--end::Tables Widget 9-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
<!--end::Content-->

<?php echo '<script'; ?>
>

    $(function () {
        layui.use(['hex', 'form'], function () {
            let table = $('#trade-card');
            let cao = layui.hex;
            let form = layui.form;
            let status = ['<span class="badge badge-light-danger">未出售</span>', '<span class="badge badge-light-success">已出售</span>', '<span class="badge badge-light">锁定</span>'];

            let queryParams = null;
            table.bootstrapTable({
                url: '/admin/api/card/data',//请求的url地址
                method: "post",//请求方式
                // striped:true,//是否显示行间隔色
                pageSize: 15,//每页显示的数量
                pageList: [15, 25, 50, 100],
                showRefresh: false,//是否显示刷新按钮
                cache: false,//是否使用缓存
                showToggle: false,//是否显示详细视图和列表视图的切换按钮
                cardView: false,
                pagination: true,//是否显示分页
                pageNumber: 1,//初始化显示第几页，默认第1页
                singleSelect: false,//复选框只能选择一条记录
                sidePagination: 'server',//分页显示方式，可以选择客户端和服务端（server|client）
                contentType: "application/x-www-form-urlencoded",//使用post请求时必须加上
                dataType: "json",//接收的数据类型
                queryParamsType: 'limit',//参数格式，发送标准的Restful类型的请求
                queryParams: function (params) {
                    params.page = (params.offset / params.limit) + 1;
                    if (queryParams) {
                        for (const key in params) {
                            queryParams[key] = params[key];
                        }
                        console.log(queryParams)
                    } else {
                        queryParams = params;
                    }
                    return queryParams;
                },
                //回调函数
                responseHandler: function (res) {
                    return {
                        "total": res.count,
                        "rows": res.data
                    }
                },
                columns: [
                    {checkbox: true},
                    {
                        field: 'secret', title: '卡密信息', formatter: function (val, item) {
                            return '<span class="badge badge-light">' + item.secret + '</span>';
                        }
                    }
                    , {
                        field: 'commodity', title: '商品', formatter: function (val, item) {
                            if (!item.commodity) {
                                return "-";
                            }
                            return '<span class="badge badge-light" style="cursor: pointer;" >' + item.commodity.name + '</span>';

                        }
                    }
                    , {
                        field: 'race', title: '类别', formatter: function (val, item) {
                            if (!item.race) {
                                return "-";
                            }
                            return '<span class="badge badge-light">' + item.race + '</span>';

                        }
                    }
                    , {field: 'create_time', title: '创建时间'}
                    , {field: 'note', title: '备注信息'}
                    , {
                        field: 'status', title: '状态', formatter: function (val, item) {
                            return status[item.status];
                        }
                    }
                    , {
                        field: 'purchase_time', title: '出售时间', formatter: function (val, item) {
                            if (!item.purchase_time) {
                                return '-';
                            }
                            return item.purchase_time;
                        }
                    }
                    , {
                        field: 'order', title: '订单号', formatter: function (val, item) {
                            if (!item.order) {
                                return "-";
                            }
                            return '<span class="badge badge-light" style="cursor: pointer;" >' + item.order.trade_no + '</span>';
                        }
                    }
                    , {
                        field: 'owner', title: '所属者', formatter: function (val, item) {
                            if (!item.owner) {
                                return '<span class="badge badge-light-success owner" style="cursor: pointer;" >SYSTEM</span>';
                            }
                            return '<span class="badge badge-light-dark owner" style="cursor: pointer;" ><img src="' + item.owner.avatar + '"  style="width: 18px;border-radius: 100%;"/> ' + item.owner.username + '(' + item.owner.id + ')</span>'
                        },
                        events: {
                            'click .owner': function (event, value, row, index) {
                                let id = row.owner ? row.owner.id : 0;
                                $("input[name='equal-owner']").val(id);
                                table.bootstrapTable('refresh', {
                                    silent: true,
                                    pageNumber: 1,
                                    query: {"equal-owner": id}
                                });
                            }
                        }
                    },
                    {
                        field: 'operate',
                        title: '操作',
                        formatter: function (val, item) {
                            let html = '';
                            if (item.status == 0) {
                                html += '<button type="button"  class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 lock"><i class="fa fa-lock" style="color: #ffa361;"></i></button> ';
                            } else if (item.status == 2) {
                                html += '<button type="button"  class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 unlock"><i class="fa fa-lock-open" style="color: #3f425475;"></i></button> ';
                            }
                            html += '<button type="button"  class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 del"><i class="fas fa-trash"></i></button> ';
                            return html;
                        },
                        events: {
                            'click .del': function (event, value, row, index) {
                                layer.confirm('您是否要移除该卡密，这是无法恢复的？', {
                                    btn: ['确认移除', '取消']
                                }, function () {
                                    cao.$post('/admin/api/card/del', {list: [row.id]}, res => {
                                        layer.msg("移除成功");
                                        table.bootstrapTable('refresh', {silent: true});
                                    });
                                });
                            },
                            'click .lock': function (event, value, row, index) {
                                cao.$post('/admin/api/card/edit', {id: row.id, status: 2}, res => {
                                    layer.msg("锁定成功");
                                    table.bootstrapTable('refresh', {silent: true});
                                });
                            },
                            'click .unlock': function (event, value, row, index) {
                                cao.$post('/admin/api/card/edit', {id: row.id, status: 0}, res => {
                                    layer.msg("解锁成功");
                                    table.bootstrapTable('refresh', {silent: true});
                                });
                            }
                        }
                    }
                ]
            });

            let modal = (values = {}) => {
                cao.popup('/admin/api/card/save', [
                    {
                        title: "选择商品",
                        name: "commodity_id",
                        type: "select",
                        dict: "commodity->owner=0 and delivery_way=0 and (shared_id is null or shared_id=0),id,name",
                        placeholder: "请选择商品",
                        search: true
                    },
                    {
                        title: "商品类别",
                        name: "race",
                        type: "input",
                        placeholder: "商品类别，一般你用不着，而且不懂不要乱填哦，想用请查看说明文档"
                    },
                    {
                        title: "备注信息",
                        name: "note",
                        type: "input",
                        placeholder: "备注信息(可空)，方便查询某次添加的卡密"
                    },
                    {
                        title: "卡密信息",
                        name: "secret",
                        type: "textarea",
                        placeholder: "卡密信息+预选信息（多个），一行即算一个卡密信息+预选信息\n\n" +
                            "例子1（游戏账号+预选信息）：\n大区:神境之地----等级:100----ID:逆天而行----觉醒:已觉醒----段位:无人之境----账号:admin----密码:123456#[大区:神境之地----等级:100----ID:逆天而行----觉醒:已觉醒----段位:无人之境]#\n\n" +
                            "例子2（卡密信息+无预选）：\nAAKvSsfWGnFdnqP\nf5V61wpeAIuX35t\n1a9Xn35qsEQwp32\n\n提示：#[我是预选信息内容]#，预选信息代表买家在购买的时候可以通过加价的方式预选自己想购买的卡密信息，一般用作与购买自己想要的账号等",
                        height: 420
                    },
                    {
                        title: "",
                        name: "explain",
                        type: "explain",
                        placeholder: '<input class="draft-input" style="border:1px solid #fdabe678;border-radius: 5px;padding: 0 0 0 5px;" type="text" placeholder="预选卡密隐藏正则，可不填"><button type="button" style="border: none;margin-left: 5px;padding: 0 5px 0 5px;background: #fd6ace96;border-radius: 5px;color: whitesmoke;" class="draft-btn">处理</button>'
                    },
                    {
                        title: "去除重复",
                        name: "unique",
                        type: "switch",
                        text: "启用（保持数据唯一，会占用CPU资源）"
                    },
                ], res => {
                    table.bootstrapTable('refresh', {silent: true});
                }, values, ["660px", "770px"], false, "添加", unqueId => {
                    $('.draft-btn').click(function () {
                        let regx = $('.draft-input').val();
                        let cards = cao.popupElement("secret", "textarea", unqueId).val().trim();
                        let newCards = "";
                        let success = 0;
                        let error = 0;
                        cards.split('\n').forEach(item => {
                            item = item.trim();
                            if (/#\[(.*?)\]#/.test(item)) {
                                newCards += item + "\n";
                                error++;
                            } else {
                                newCards += item + '#[' + item.replace(eval("/" + regx + "/i"), "") + ']#\n';
                                success++;
                            }
                        });
                        cao.popupElement("secret", "textarea", unqueId).val(newCards.trim());
                        layer.msg("预选卡密处理完成，已处理：" + success + "，未处理：" + error);
                    });
                });
            }

            $('.btn-app-create').click(function () {
                modal();
            });

            $('.btn-app-del').click(() => {
                let data = cao.listObjectToArray(table.bootstrapTable('getSelections'));
                if (data.length == 0) {
                    layer.msg("请至少勾选1个卡密再进行操作！");
                    return;
                }

                layer.confirm('您确定要删除已经选中的卡密吗？这是不可恢复的操作！', {
                    btn: ['确定', '取消']
                }, function () {
                    cao.$post("/admin/api/card/del", {list: data}, res => {
                        layer.msg("删除成功");
                        table.bootstrapTable('refresh', {silent: true});

                    });
                });
            });

            $('.btn-app-lock').click(() => {
                let data = cao.listObjectToArray(table.bootstrapTable('getSelections'));
                if (data.length == 0) {
                    layer.msg("请至少勾选1个卡密进行操作！");
                    return;
                }
                layer.confirm('您确定要锁定选中的卡密吗？', {
                    btn: ['确定', '取消']
                }, function () {
                    cao.$post("/admin/api/card/lock", {list: data}, res => {
                        layer.msg("锁定成功");
                        table.bootstrapTable('refresh', {silent: true});

                    });
                });
            });

            $('.btn-app-unlock').click(() => {
                let data = cao.listObjectToArray(table.bootstrapTable('getSelections'));
                if (data.length == 0) {
                    layer.msg("请至少勾选1个卡密进行操作！");
                    return;
                }
                layer.confirm('您确定要解锁选中的卡密吗？', {
                    btn: ['确定', '取消']
                }, function () {
                    cao.$post("/admin/api/card/unlock", {list: data}, res => {
                        layer.msg("解锁成功");
                        table.bootstrapTable('refresh', {silent: true});

                    });
                });
            });

            $('.btn-app-sell').click(() => {
                let data = cao.listObjectToArray(table.bootstrapTable('getSelections'));
                if (data.length == 0) {
                    layer.msg("请至少勾选1个卡密进行操作！");
                    return;
                }
                layer.confirm('您确定要手动出售选中的卡密吗？', {
                    btn: ['确定', '取消']
                }, function () {
                    cao.$post("/admin/api/card/sell", {list: data}, res => {
                        layer.msg("操作成功");
                        table.bootstrapTable('refresh', {silent: true});
                    });
                });
            });

            $('.btn-app-export').click(function () {
                layer.open({
                    type: 1,
                    shade: 0.3,
                    content: '<form class="layui-form" action="">\n' +
                        '    <div style="margin-top: 10px;margin-left: 20px;margin-right: 20px;"><p style="padding: 5px 5px 10px 5px;color: green;">PS：筛选的意思是，通过查询条件进行筛选导出，在哪查询？你猜~</p>\n' +
                        '      <input type="radio" name="export_status" value="0" title="不操作" checked>\n' +
                        '      <input type="radio" name="export_status" value="1" title="锁定卡密">\n' +
                        '      <input type="radio" name="export_status" value="2" title="删除卡密">\n' +
                        '      <input type="radio" name="export_status" value="3" title="已出售">\n' +
                        '    </div>\n' +
                        '    <div style="margin-top: 10px;margin-left: 20px;margin-right: 20px;">\n' +
                        '      <input type="input" name="export_num" class="layui-input" placeholder="指定导出数量，不填则全部哦">\n' +
                        '    </div>\n' +
                        '</form>',
                    title: "导出后，你还想做什么？（・ω・）",
                    btn: ['确认', '取消'],
                    area: cao.isPc() ? "460px" : ["100%", "100%"],
                    shadeClose: true,
                    yes: (index, layero) => {
                        layer.close(index);
                        let exportStatus = $(".layui-form input[name=export_status]:checked").val();
                        let exportNum = $(".layui-form input[name=export_num]").val();
                        let query = $('.search-query').serialize();
                        window.open('/admin/api/card/export?exportStatus=' + exportStatus + "&exportNum=" + exportNum + "&" + query);
                    },
                    success: (layero, index) => {
                        form.render();
                    }
                });
            });

            cao.query('.search-query', table, [
                {title: "卡密信息(精确搜索,速度快)", name: "equal-secret", type: "input"},
                {title: "卡密信息(模糊搜索,速度慢)", name: "search-secret", type: "input"},
                {title: "备注信息", name: "equal-note", type: "input"},
                {
                    title: "状态", name: "equal-status", type: "select", dict: [
                        {id: 0, name: "未出售"},
                        {id: 1, name: "已出售"},
                        {id: 2, name: "锁定"},
                    ]
                },
                {
                    title: "查询商品",
                    name: "equal-commodity_id",
                    type: "select",
                    dict: "commodity->owner=0 and delivery_way=0 and (shared_id is null or shared_id=0),id,name",
                    search: true
                },
                {title: "商品类别", name: "equal-race", type: "input"},
                {title: "卡密所属会员ID，0=系统", name: "equal-owner", type: "input"},
                {title: "入库时间从", name: "betweenStart-create_time", type: "date"},
                {title: "到入库时间", name: "betweenEnd-create_time", type: "date"},
            ], true, false);
        });
    });
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:../Footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
