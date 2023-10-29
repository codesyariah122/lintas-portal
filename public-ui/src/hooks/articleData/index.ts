import { useQuery } from "@tanstack/react-query";
import { CORE_URL, API_KEY } from "@/constants/env";

const fetchArticleData = async () => {
	const response = await fetch(`${CORE_URL}/public/article-lists`, {
		method: "GET",
		headers: {
			"X-Api-Key": API_KEY,
		},
	});

	if (!response.ok) {
		throw new Error("Failed to fetch data");
	}

	const result = await response.json();
	return result;
};

const useArticleData = () => {
	return useQuery({
		queryKey: ["getArticleData"],
		queryFn: async () => await fetchArticleData(),
	});
};

export { useArticleData };
