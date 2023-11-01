import { useQuery } from "@tanstack/react-query";
import { CORE_URL, API_KEY } from "@/constants/env";

const fetchAllArticles = async () => {
	const response = await fetch(`${CORE_URL}/public/article-lists`, {
		method: "GET",
		headers: {
			"X-Api-Key": API_KEY,
		},
	});

	if (!response.ok) {
		throw new Error("Failed fetch article lists!");
	}

	const results = await response.json();
	return results;
};

const useAllArticles = () => {
	return useQuery({
		queryKey: ["getAllArticles"],
		queryFn: async () => fetchAllArticles(),
	});
};

export { useAllArticles };
