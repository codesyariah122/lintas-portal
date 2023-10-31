import * as React from "react";
import _ from "lodash";
import { Card } from "flowbite-react";
import { useArticleData } from "@/hooks";

interface Article {
	id: number;
	title: string;
	cover: string;
}

interface ArticleProps {
	articleLists: Object;
	isLoading: Boolean;
	isError: Boolean;
}

export default function ArtcileLists({
	articleLists,
	isLoading,
	isError,
}: ArticleProps) {
	return (
		<div>
			{isLoading ? (
				<div>
					<h1>Article is loading ... now</h1>
				</div>
			) : (
				articleLists && (
					<div className="grid grid-cols-3 gap-4">
						{_.map(articleLists?.data, (item: Article, idx) => (
							<div key={item.id}>
								<Card
									imgAlt={item?.cover && item?.cover_caption}
									imgSrc={
										item?.cover &&
										`http://lintas.xz/storage/uploads/articles/${item?.cover}`
									}
								>
									<h5 className="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
										<p>{item?.title}</p>
									</h5>
									<p className="font-normal text-gray-700 dark:text-gray-400">
										{item?.content}
									</p>
								</Card>
							</div>
						))}
					</div>
				)
			)}
		</div>
	);
}
