<script>

columns: [
    { data: 'sl' },
    { data: 'name' },
    { data: 'position' },
    { data: 'salary' },
    { data: 'start_date',
        render: function ( data, type, row ) {
            console.log(type);
            if ( type === 'display' || type === 'filter' ) {
                var d = new Date();
                return d.getDate() +'-'+ (d.getMonth()+1) +'-'+ d.getFullYear();
                // return `<h1> ${d.getDate() +'-'+ (d.getMonth()+1) +'-'+ d.getFullYear()} </h1>`;
            }
            return data;
        }
    }
]





</script>