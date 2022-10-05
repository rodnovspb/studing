<template>
	<template v-if="isEdit">
		{{ name }}
		{{ surn }}
		<button @click="edit">
			edit
		</button>
	</template>
	<template v-else>
		<input v-model="newName">
		<input v-model="newSurn">
		<button @click="save">
			save
		</button>
	</template>
</template>

<script>
  export default {
    props: {
      id: Number,
      name: String,
      surn: String,
    },
    data() {
      return {
        isEdit: false,
        newName: name,
        newSurn: surn,
      }
    },
    methods: {
      edit() {
        this.isEdit = true;
      },
      save() {
        this.isEdit = false;
        $emit('change', newName, newSurn);
      }
    }
  }

</script>