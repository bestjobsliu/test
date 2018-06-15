@extends('layouts.header')
<script src = "{{ asset('js/vue.min.js') }}" ></script>
<script src="{{ asset('js/axios.min.js') }}"></script>


<div id="app">

    <div class="wrap">
        <header class="header">
            <div class="container">
                <div class="fl">
                    <a class="logo" href="/permissionDepartment"> Yoozoo</a>
                </div>
                <div class="nav-list fl">
                    <a class="nav-item active" href="/permissionDepartment" data-type="0">用户管理</a>
                    <a class="nav-item" href="/permissionUser" data-type="1">角色管理</a>
                    <a class="nav-item" href="/permissionCustom" data-type="2">权限</a>
                </div>
                <div class="user-info fr">
                    <dropdown trigger="click" style="margin-left: 20px" @on-click="menuClick">
                        <a href="javascript:void(0)">

                            <Icon type="arrow-down-b"></Icon>
                        </a>
                        <dropdown-menu slot="list">
                            <dropdown-item name="logout" v-text="logout"></dropdown-item>
                        </dropdown-menu>
                    </dropdown>
                </div>
            </div>
        </header>
        <div class="main container">
            <div class="main-container-wrap">
                <div class="main-left">
                    <div class="input-group col-md-12">
                        <input  type="text" class="form-control"  style="" placeholder="请输入用户名" v-model="username"   />
                        <span class="input-group-btn">
                		<button @keyup="getUserList" class="btn btn-info btn-search">查找</button>
                	</span>
                    </div>
                </div>
                <div class="main-right">
                    <div class="user-list">
                        <template>
                            <div style="border-bottom: 1px solid #e9e9e9;padding-bottom:6px;margin-bottom:6px;">
                                <Checkbox
                                        :indeterminate="indeterminate"
                                        :value="checkAll"
                                        @click.prevent.native="handleCheckAll">全选</Checkbox>
                            </div>
                            <Checkbox-group v-model="checkAllGroup" @on-change="checkAllGroupChange">
                                <Checkbox label="香蕉"></Checkbox>
                                <Checkbox label="苹果"></Checkbox>
                                <Checkbox label="西瓜"></Checkbox>
                            </Checkbox-group>
                        </template>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>




<script src = "{{ asset('js/role.js') }}" ></script>

@extends('layouts.footer')