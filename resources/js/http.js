export async function otherUsers() {
    return axios.get('/ajax/users');
}