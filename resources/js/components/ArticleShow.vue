<template>
    <div class='container py-4'>
        <div class='row justify-content-center'>
            <div class='col-md-8'>
                <div class='card'>
                    <div class='card-header'>Detail Article</div>
                    <div class='card-body'>
                        
                        <div class='form-group'>
                            <label htmlFor='content'>Date</label> 
                            <br>
                            <span> {{ article.report_date }} </span>
                        </div>
                         <div class='form-group'>
                            <label htmlFor='content'>Title</label> 
                            <br>
                            <span> {{ article.title }} </span>
                        </div>

                         <div class='form-group'>
                            <label htmlFor='content'>Content</label> 
                            <br>
                            <span> {{ article.content }} </span>
                        </div>

                        <div class='form-group'>
                            <label htmlFor='content'>Agent</label> 
                            <br>
                            <span> {{ article.agent }} </span>
                        </div>

                         <div class='form-group'>
                            <label htmlFor='content'>Lokasi</label> 
                            <br>
                            <span> {{ article.lokasi }} </span>
                        </div>
                        <div class='form-group'>
                            <router-link :to="{ name: 'home' }" class="btn btn-secondary">Back</router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
        return {
            article:{},
        }
    },
    created() {
        let uri = `/api/article/show/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
            this.article = response.data;
        });
    },
    method: {

    }
  }
</script>