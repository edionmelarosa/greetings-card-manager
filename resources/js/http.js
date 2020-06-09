export async function otherUsers() {
    return axios.get('/ajax/users');
}

export async function profile() {
    return axios.get('/ajax/profile');
}