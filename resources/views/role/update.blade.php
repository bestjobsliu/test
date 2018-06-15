@extends('layouts.header')
<script src = "{{ asset('js/vue.min.js') }}" ></script>
<script src="{{ asset('js/axios.min.js') }}"></script>


<div id="app">

    <div class="wrap">
        <header class="header">
            <div class="container">
                <div class="fl">
                    <a class="logo" href="/permissionDepartment"> Yoozoo <!-- <img src="" alt="中控台"> --></a>
                </div>
                <div class="nav-list fl">
                    <a class="nav-item active" href="/permissionDepartment" data-type="0">用户管理</a>
                    <a class="nav-item" href="/permissionUser" data-type="1">角色管理</a>
                    <a class="nav-item" href="/permissionCustom" data-type="2">权限</a>
                </div>
                <div class="user-info fr">
                    <dropdown trigger="click" style="margin-left: 20px" @on-click="menuClick">
                        <a href="javascript:void(0)">
                            <?=$username?>
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
                        <table class="table">
                            <thead>
                            <tr>
                                <td>姓名</td>
                                <td>邮箱</td>
                                <td>角色</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="userInfo in userlist">
                                <td v-text="userInfo.name"></td>
                                <td v-text="userInfo.email"></td>
                                <td>
                                    <i-select @on-change="workChange(userInfo)" v-model="userInfo.position" style="width: 200px;">
                                        <i-option v-for="item in worklist" :value="item.id" :key="item.value" :label="item.name"></i-option>
                                    </i-select>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <page :total="userCount" show-sizer @on-change="pageChange" :current="currentPage" :page-size="pageSize" @on-page-size-change="pageSizeChange"></page>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>




<script src = "{{ asset('js/permissionDepartment.js') }}" ></script>

@extends('layouts.footer')