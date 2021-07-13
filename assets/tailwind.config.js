module.exports = {
	purge: [
		// Paths to your templates...
		"../**.php",
		"../**/**.php",
		"./src/js/**.js",
	],
	darkMode: false, // or 'media' or 'class'
	theme: {
		fontFamily: {
			sans: 'Raleway, "Segoe UI", "Helvetica Neue", Arial, "Noto Sans", sans-serif',
			agency: "AgencyFB",
		},
		extend: {
			zIndex: {
				"-10": "-10",
			},
			maxWidth: {
				1280: "1280px",
				1024: "1024px",
				760: "760px",
				500: "500px",
			},
			maxHeight: {
				90: "22.5rem",
				none: "none",
			},
			width: {
				"1/10": "10%",
				"2/10": "20%",
				"3/10": "30%",
				"4/10": "40%",
				"5/10": "50%",
				"6/10": "60%",
				"7/10": "70%",
				"8/10": "80%",
				"9/10": "90%",
				18: "4.5rem",
			},
			height: {
				"1/10": "10%",
				"2/10": "20%",
				"3/10": "30%",
				"4/10": "40%",
				"5/10": "50%",
				"6/10": "60%",
				"7/10": "70%",
				"8/10": "80%",
				"9/10": "90%",
				90: "22.5rem",
			},
			padding: {
				"1/15": "15%",
			},
		},
	},
	variants: {
		extend: {},
	},
	plugins: [],
};
