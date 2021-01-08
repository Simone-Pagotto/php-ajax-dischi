const genres = ['rock','pop','metal','jazz']
const myDischi = new Vue ({
	el:"#root",
	data:{
		genres: [...genres],
		cds:[],
		filteredCds:[],
		selected: ""
	},
	mounted(){
		axios
			.get("http://localhost/php-ajax-dischi/part-2/server.php")
			.then((result) => {
				for(let i=0; i<result.data.response.length; i++){
					/* console.log(result.data.response[i]); */
					this.cds.push(result.data.response[i]);
				}
			})

			Promise.all(this.cds);
			
	},
	methods: {
		filterCds(){
			this.filteredCds=this.cds.filter((cd) => 
				cd.genre.toLowerCase().includes(this.selected)
			)
		}
	}		
});
/* .get("https://flynn.boolean.careers/exercises/api/array/music") */