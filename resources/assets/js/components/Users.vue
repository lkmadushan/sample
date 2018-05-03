<script>
    export default {
        data () {
            return {
                users: [],
            }
        },

        created () {
            this.fetch()
        },

        render () {
            return this.$scopedSlots.default({
                users: this.users
            })
        },

        methods: {
            async fetch () {
                let { data } = await axios.get('/api/v1/users')

                this.users = data
            }
        }
    }
</script>
