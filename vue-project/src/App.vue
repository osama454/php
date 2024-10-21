<template>
  <div>
    <loading-button @click="loadRelations" class="btn btn-default btn-primary">
        Load Relations
    </loading-button>

    <div v-if="relationsLoaded">
        <p>User: {{ post.user.name }}</p> 
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      post: this.resource, // Assuming your resource is passed as 'resource'
      relationsLoaded: false,
    };
  },
  methods: {
    loadRelations() {
      Nova.request()
        .get(`/nova-api/${this.resourceName}/${this.post.id}/load-relations`) // Replace with your endpoint
        .then(response => {
          this.post.user = response.data.user; // Update the post object with the loaded relation
          this.relationsLoaded = true;
        });
    },
  },
};
</script>