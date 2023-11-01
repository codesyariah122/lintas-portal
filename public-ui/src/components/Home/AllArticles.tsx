import * as React from "react";
import _ from "lodash";
import { Card } from "flowbite-react";

interface Articles {
	id: number;
	title: string;
	cover: string;
	cover_caption: string;
	content: string;
}

interface AllArticlesProps {
	articles: Object;
	loading: Boolean;
	error: Boolean;
}

export default function AllArticles({
	articles,
	loading,
	error,
}: AllArticlesProps) {
	return (
		<React.Fragment>
			{_.isObject(articles?.data) && _.isArray(articles?.data) && (
				<div className="grid grid-cols-3 gap-4 py-6">
					{_.map(articles?.data, (item: Articles, idx: number) => (
						<div key={item?.id}>
							<Card
								imgAlt={item?.cover && item?.cover_caption}
								imgSrc={
									item?.cover &&
									`http://lintas.xz/storage/uploads/articles/${item?.cover}`
								}
							>
								<h3 className="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
									{item?.title}
								</h3>
								<p className="font-normal text-gray-700 dark:text-gray-400">
									{item?.content}
								</p>
							</Card>
						</div>
					))}
				</div>
			)}
		</React.Fragment>
	);
}
