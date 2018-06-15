window.onload = function() {
    var vm = window.vm = new Vue({
        el: '#app',
        data: {
            logout: '退出',
            username: '', // 用户名
            id: '', // 组织id
            dep_no:'',//组织编码
            userCount : 0,
            userlist: [], // 用户列表
            worklist: [],
            treeData: [], // 组织树
            total: 0, // 总成员数
            currentPage: 1,
            pageSize: 10,
            checked : false,
            indeterminate: true,
            checkAll: false,
            checkAllGroup: ['香蕉', '西瓜']

        },
        methods: {
            handleCheckAll () {
                if (this.indeterminate) {
                    this.checkAll = false;
                } else {
                    this.checkAll = !this.checkAll;
                }
                this.indeterminate = false;

                if (this.checkAll) {
                    this.checkAllGroup = ['香蕉', '苹果', '西瓜'];
                } else {
                    this.checkAllGroup = [];
                }
            },
            checkAllGroupChange (data) {
                if (data.length === 3) {
                    this.indeterminate = false;
                    this.checkAll = true;
                } else if (data.length > 0) {
                    this.indeterminate = true;
                    this.checkAll = false;
                } else {
                    this.indeterminate = false;
                    this.checkAll = false;
                }
            },
            pageChange(page) {
                this.currentPage = page
                vm.getUserList()
            },
            pageSizeChange(pageSize) {
                this.pageSize = pageSize
                vm.getUserList()
            },
            menuClick(type) {
                window.location.href = "/logout";
            },
            /**
             * 获取组织树
             */
            getTree() {
                axios.get('/userInfo/getDpInfoAllByTree', {
                    params: {
                    }
                }).then(response => {
                    this.treeData = response.data
                });
            },
            /**
             * 获取用户列表
             * @return {[type]} [description]
             */
            getUserList() {
                axios.get('/user/getUserList', {params: {
                    pageSize:this.pageSize,
                    currentPage:this.currentPage,
                }}) .then(response =>{
                    this.userlist = response.data['data'];
                    this.userCount = response.data['total'];
                })
            },
            /*
            获取用户权限列表
             */
            getRoles(){
                axios.get('/role/all', {params: {

                    }}) .then(response =>{
                    this.worklist = response.data['data'];
                })
            },
            /**
             * 搜索用户
             * @return {[type]} [description]
             */
            searchUser() {

            },

            /**
             * 职位点击事件
             */
            workChange(user) {
                axios.post('/userInfo/changePosition', {
                    params: {
                        'position' : user.position,
                        'userId' : user.id
                    }
                })
                .then(response =>{
                    if(response.data != this.userCount){
                        this.userCount = response.data;
                        vm.$Message.success('修改成功');
                    } else {
                        vm.$Message.error('修改失败');
                    }
                })
            }
        },
        watch : {
            username:function(val) {
                this.username = val;
                this.id = '';
                this.getUserList();
            },
        }


    });
    vm.getUserList();
    vm.getRoles();
};
