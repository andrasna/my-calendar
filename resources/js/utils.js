export const fetcher = async (opts) => {
    const { url, method, body } = opts

    const response = await fetch(url, {
      method,
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(body),
    })

    return response.json()
}
