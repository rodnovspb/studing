export const capitalizeFirstLetter = (str) => {
	if(!str) return ''

	return str.charAt(0).toUpperCase() + str.slice(1)
}