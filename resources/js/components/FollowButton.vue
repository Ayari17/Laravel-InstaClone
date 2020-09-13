<template>
    <div>
        <div v-if="button">
        <button class="btn btn-primary ml-4" @click="followUser" v-text="buttonText">
        </button>
        </div>
        <div v-else>
            <a @click="followUser" v-text="buttonText" class="pl-3 d-inline-block"></a>
        </div>
    </div>
</template>

<script>
    export default {
        props : ['userId','follows',"button"],

        data : function(){
          return{
              status : this.follows
          }
        },

        methods: {
            followUser() {
                axios.post(`/follow/${this.userId}`).then(resp => {
                    this.status = ! this.status;
                }).catch(errors =>{
                    if(errors.response.status === 401){
                        window.location='/login';
                    }
                });


            }
        },
        computed : {
            buttonText(){

                return (this.status) ? 'Unfollow' : 'Follow';
            }
        }
    }
</script>
